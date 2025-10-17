<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Follow Lists
 * 
 * APIs for managing follow relationships and lists
 */
class FollowListController extends Controller
{
    /**
     * Get followers list
     * 
     * @queryParam page integer Page number for pagination. Example: 1
     * @queryParam per_page integer Number of items per page. Example: 20
     * 
     * @response 200 {
     *   "success": true,
     *   "data": {
     *     "data": [
     *       {
     *         "id": 1,
     *         "name": "John Doe",
     *         "email": "john@example.com",
     *         "created_at": "2024-01-01T00:00:00.000000Z"
     *       }
     *     ],
     *     "pagination": {
     *       "current_page": 1,
     *       "last_page": 5,
     *       "per_page": 20,
     *       "total": 100
     *     }
     *   }
     * }
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $user = auth()->user();
            $page = $request->get('page', 1);
            $perPage = $request->get('per_page', 20);
            
            $followers = $user->followers()
                ->with('followers')
                ->paginate($perPage, ['*'], 'page', $page);

            return response()->json([
                'success' => true,
                'data' => $followers
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch followers',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get following list
     * 
     * @queryParam page integer Page number for pagination. Example: 1
     * @queryParam per_page integer Number of items per page. Example: 20
     * 
     * @response 200 {
     *   "success": true,
     *   "data": {
     *     "data": [
     *       {
     *         "id": 2,
     *         "name": "Jane Smith",
     *         "email": "jane@example.com",
     *         "created_at": "2024-01-01T00:00:00.000000Z"
     *       }
     *     ],
     *     "pagination": {
     *       "current_page": 1,
     *       "last_page": 3,
     *       "per_page": 20,
     *       "total": 50
     *     }
     *   }
     * }
     */
    public function following(Request $request): JsonResponse
    {
        try {
            $user = auth()->user();
            $page = $request->get('page', 1);
            $perPage = $request->get('per_page', 20);
            
            $following = $user->following()
                ->with('following')
                ->paginate($perPage, ['*'], 'page', $page);

            return response()->json([
                'success' => true,
                'data' => $following
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch following',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}