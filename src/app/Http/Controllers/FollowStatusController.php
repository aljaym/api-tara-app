<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * @group Follow Status
 * 
 * APIs for checking follow status between users
 */
class FollowStatusController extends Controller
{
    /**
     * Check follow status
     * 
     * @queryParam user_id integer required ID of the user to check status with. Example: 1
     * 
     * @response 200 {
     *   "success": true,
     *   "data": {
     *     "is_following": true,
     *     "followers_count": 15,
     *     "following_count": 8
     *   }
     * }
     */
    public function show(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id'
            ]);

            $user = User::findOrFail($validated['user_id']);
            $currentUser = auth()->user();

            return response()->json([
                'success' => true,
                'data' => [
                    'is_following' => $currentUser->isFollowing($user),
                    'followers_count' => $user->followers()->count(),
                    'following_count' => $user->following()->count()
                ]
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to check follow status',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}