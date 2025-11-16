<?php

namespace App\Http\Controllers\Api\Share;

use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File;
use App\Models\Folder;

class RemoveUserFromShareController extends BaseApiController
{
    /**
     * DELETE /api/shares/{id}/users/{userId} - remove a user's access from a share
     */
    public function destroy(Request $request, $id, $userId)
    {
        $user = $request->user();
        if (! $user) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated.'], 401);
        }

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

        // Only owner may remove recipients
        if ((int) $share->user_id !== (int) $user->id) {
            return response()->json(['success' => false, 'message' => 'Share not found.'], 404);
        }

        // Check if the user is currently a recipient of this share
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
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'User removed from share.'
        ]);
    }
}
