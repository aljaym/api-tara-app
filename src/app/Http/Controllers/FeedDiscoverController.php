<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Feed Discovery
 * 
 * APIs for discovering new events and content
 */
class FeedDiscoverController extends Controller
{
    /**
     * Discover new events and content
     * 
     * @queryParam category string Filter by event category. Example: Travel
     * @queryParam location string Filter by location. Example: Baguio
     * @queryParam page integer Page number for pagination. Example: 1
     * @queryParam per_page integer Number of items per page. Example: 20
     * 
     * @response 200 {
     *   "success": true,
     *   "data": {
     *     "data": [
     *       {
     *         "id": 1,
     *         "title": "Baguio Mountain Trek",
     *         "description": "Amazing mountain trekking experience",
     *         "location": "Baguio, Philippines",
     *         "start_date": "2024-01-15",
     *         "category": "Adventure",
     *         "user": {
     *           "id": 1,
     *           "name": "John Doe"
     *         }
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
            $category = $request->get('category');
            $location = $request->get('location');
            $page = $request->get('page', 1);
            $perPage = $request->get('per_page', 20);

            $query = Event::where('is_active', true)
                ->where('start_date', '>', now())
                ->with(['user', 'posts']);

            if ($category) {
                $query->where('category', $category);
            }

            if ($location) {
                $query->where('location', 'like', "%{$location}%");
            }

            $events = $query->orderBy('created_at', 'desc')
                ->paginate($perPage, ['*'], 'page', $page);

            return response()->json([
                'success' => true,
                'data' => $events
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch discover content',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}