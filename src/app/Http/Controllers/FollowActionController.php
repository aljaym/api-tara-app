<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * @group Follow Actions
 * 
 * APIs for following and unfollowing users
 */
class FollowActionController extends Controller
{
    /**
     * Follow a user
     * 
     * @bodyParam user_id integer required ID of the user to follow. Example: 1
     * 
     * @response 200 {
     *   "success": true,
     *   "message": "Successfully followed user",
     *   "data": {
     *     "is_following": true,
     *     "followers_count": 15
     *   }
     * }
     * 
     * @response 400 {
     *   "success": false,
     *   "message": "You cannot follow yourself"
     * }
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id'
            ]);

            $userToFollow = User::findOrFail($validated['user_id']);
            $currentUser = auth()->user();

            if ($currentUser->id === $userToFollow->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'You cannot follow yourself'
                ], 400);
            }

            $currentUser->follow($userToFollow);

            return response()->json([
                'success' => true,
                'message' => 'Successfully followed user',
                'data' => [
                    'is_following' => true,
                    'followers_count' => $userToFollow->followers()->count()
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
                'message' => 'Failed to follow user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Unfollow a user
     * 
     * @bodyParam user_id integer required ID of the user to unfollow. Example: 1
     * 
     * @response 200 {
     *   "success": true,
     *   "message": "Successfully unfollowed user",
     *   "data": {
     *     "is_following": false,
     *     "followers_count": 14
     *   }
     * }
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id'
            ]);

            $userToUnfollow = User::findOrFail($validated['user_id']);
            $currentUser = auth()->user();

            $currentUser->unfollow($userToUnfollow);

            return response()->json([
                'success' => true,
                'message' => 'Successfully unfollowed user',
                'data' => [
                    'is_following' => false,
                    'followers_count' => $userToUnfollow->followers()->count()
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
                'message' => 'Failed to unfollow user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}