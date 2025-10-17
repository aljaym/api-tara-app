<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Follow
 * 
 * APIs for managing follow relationships
 */
class FollowController extends Controller
{
    /**
     * Get follow relationships overview
     * 
     * @response 200 {
     *   "success": true,
     *   "data": {
     *     "followers_count": 15,
     *     "following_count": 8,
     *     "recent_followers": [
     *       {
     *         "id": 1,
     *         "name": "John Doe",
     *         "email": "john@example.com"
     *       }
     *     ],
     *     "recent_following": [
     *       {
     *         "id": 2,
     *         "name": "Jane Smith",
     *         "email": "jane@example.com"
     *       }
     *     ]
     *   }
     * }
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $user = auth()->user();
            
            $followersCount = $user->followers()->count();
            $followingCount = $user->following()->count();
            
            $recentFollowers = $user->followers()
                ->with('followers')
                ->latest()
                ->limit(5)
                ->get();
                
            $recentFollowing = $user->following()
                ->with('following')
                ->latest()
                ->limit(5)
                ->get();

            return response()->json([
                'success' => true,
                'data' => [
                    'followers_count' => $followersCount,
                    'following_count' => $followingCount,
                    'recent_followers' => $recentFollowers,
                    'recent_following' => $recentFollowing
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch follow overview',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
