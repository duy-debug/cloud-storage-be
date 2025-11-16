<?php

namespace App\Http\Controllers\Api\Share;

use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\File;
use App\Models\Folder;

class AddUsersToShareController extends BaseApiController
{
    /**
     * POST /api/shares/{id}/users - Add users to an existing share
     */
    public function store(Request $request, $id)
    {
        $user = $request->user();
        if (! $user) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated.'], 401);
        }

        $validator = Validator::make($request->all(), [
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'integer|distinct|min:1',
            'permission' => 'required|string|in:view,download,edit',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $userIds = array_values(array_unique(array_map('intval', $request->input('user_ids'))));
        $permission = $request->input('permission');

        $share = DB::table('shares')->where('id', $id)->first();
        if (! $share) {
            return response()->json(['success' => false, 'message' => 'Share not found.'], 404);
        }

        // If the share's target (file/folder) is soft-deleted, return not found
        if (! empty($share->file_id)) {
            $file = File::select('id', 'is_deleted', 'deleted_at')->find($share->file_id);
            if (! $file || (bool) $file->is_deleted || $file->deleted_at !== null) {
                return response()->json(['success' => false, 'message' => 'Share not found.'], 404);
            }
        }
        if (! empty($share->folder_id)) {
            $folder = Folder::select('id', 'is_deleted', 'deleted_at')->find($share->folder_id);
            if (! $folder || (bool) $folder->is_deleted || $folder->deleted_at !== null) {
                return response()->json(['success' => false, 'message' => 'Share not found.'], 404);
            }
        }

        // Only owner can add users
        if ((int) $share->user_id !== (int) $user->id) {
            return response()->json(['success' => false, 'message' => 'Share not found.'], 404);
        }

        // Fetch existing users from users table
        $existingUsers = DB::table('users')->whereIn('id', $userIds)->pluck('id')->toArray();
        $invalidUserIds = array_values(array_diff($userIds, $existingUsers));

        // Fetch already added recipient ids for this share
        $alreadyAdded = DB::table('receives_shares')->where('share_id', $id)->whereIn('user_id', $existingUsers)->pluck('user_id')->toArray();

        // Users to actually add = existingUsers - alreadyAdded
        $toAdd = array_values(array_diff($existingUsers, $alreadyAdded));

        if (empty($toAdd)) {
            return response()->json([
                'success' => false,
                'message' => 'No users were added.',
                'invalid_user_ids' => $invalidUserIds,
                'already_added_user_ids' => $alreadyAdded,
            ], 422);
        }

        DB::transaction(function () use ($toAdd, $id, $permission) {
            $now = now();
            $insert = [];
            foreach ($toAdd as $uid) {
                $insert[] = [
                    'user_id' => $uid,
                    'share_id' => $id,
                    'permission' => $permission,
                ];
            }
            if (! empty($insert)) {
                DB::table('receives_shares')->insert($insert);
            }
        });

        // Fetch names for added users
        $addedRows = DB::table('users')->whereIn('id', $toAdd)->select('id', 'name')->get();
        $addedUsers = $addedRows->map(function ($r) use ($permission) {
            return [
                'user_id' => (int) $r->id,
                'name' => $r->name,
                'permission' => $permission,
            ];
        })->values();

        return response()->json([
            'success' => true,
            'message' => 'Users added to share successfully.',
            'added_users' => $addedUsers,
        ]);
    }
}
