<?php

namespace App\Http\Controllers;

use App\Services\FeedService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Feed
 * 
 * APIs for managing user feed
 */
class FeedController extends Controller
{
    protected $feedService;

    public function __construct(FeedService $feedService)
    {
        $this->feedService = $feedService;
    }

    /**
     * Get personalized feed for the authenticated user
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
     *         "type": "post",
     *         "content": "Amazing adventure!",
     *         "user": {
     *           "id": 1,
     *           "name": "John Doe"
     *         },
     *         "created_at": "2024-01-01T00:00:00.000000Z"
     *       }
     *     ],
     *     "pagination": {
     *       "current_page": 1,
     *       "last_page": 10,
     *       "per_page": 20,
     *       "total": 200
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

            $feedData = $this->feedService->getFeed($user, $page, $perPage);

            return response()->json([
                'success' => true,
                'data' => $feedData
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch feed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
