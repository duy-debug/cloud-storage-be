<?php

namespace App\Http\Controllers\Api\Share;

use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\File;
use App\Models\Folder;

class UpdateUserPermissionController extends BaseApiController
{
    /**
     * PUT /api/shares/{id}/users/{userId} - update a specific recipient's permission
     */
    public function update(Request $request, $id, $userId)
    {
        $user = $request->user();
        if (! $user) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated.'], 401);
        }

        $validator = Validator::make($request->all(), [
            'permission' => 'required|string|in:view,download,edit',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

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

        // Only owner may change recipient permissions
        if ((int) $share->user_id !== (int) $user->id) {
            return response()->json(['success' => false, 'message' => 'Share not found.'], 404);
        }

        // Ensure the target user is a recipient of this share
        $exists = DB::table('receives_shares')
            ->where('share_id', $id)
            ->where('user_id', $userId)
            ->exists();

        if (! $exists) {
            return response()->json(['success' => false, 'message' => 'User not found on this share.'], 404);
        }

        DB::table('receives_shares')
            ->where('share_id', $id)
            ->where('user_id', $userId)
            ->update(['permission' => $permission]);

        return response()->json([
            'success' => true,
            'message' => 'User permission updated successfully.',
            'user' => [
                'user_id' => (int) $userId,
                'permission' => $permission,
            ],
        ]);
    }
}
