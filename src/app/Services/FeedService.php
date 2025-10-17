<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class FeedService
{
    /**
     * Get personalized feed for a user
     */
    public function getFeed(User $user, int $page = 1, int $perPage = 20): array
    {
        $cacheKey = "user_feed_{$user->id}_page_{$page}_per_{$perPage}";
        
        return Cache::remember($cacheKey, 300, function () use ($user, $page, $perPage) {
            return $this->generateFeed($user, $page, $perPage);
        });
    }

    /**
     * Generate the actual feed algorithm
     */
    private function generateFeed(User $user, int $page, int $perPage): array
    {
        $followingIds = $user->following()->pluck('users.id')->toArray();
        $followingIds[] = $user->id; // Include user's own content

        // Build the main feed query
        $feedQuery = $this->buildFeedQuery($followingIds);
        
        // Get total count for pagination
        $totalQuery = DB::table(DB::raw("({$feedQuery->toSql()}) as feed"))
            ->mergeBindings($feedQuery)
            ->count();

        // Apply pagination
        $offset = ($page - 1) * $perPage;
        $feedItems = $feedQuery
            ->offset($offset)
            ->limit($perPage)
            ->get();

        // Transform results
        $transformedItems = $this->transformFeedItems($feedItems);

        return [
            'data' => $transformedItems,
            'pagination' => [
                'current_page' => $page,
                'per_page' => $perPage,
                'total' => $totalQuery,
                'last_page' => ceil($totalQuery / $perPage),
                'has_more' => $offset + $perPage < $totalQuery
            ]
        ];
    }

    /**
     * Build the main feed query with all content types
     */
    private function buildFeedQuery(array $followingIds)
    {
        $postsQuery = $this->buildPostsQuery($followingIds);
        $eventsQuery = $this->buildEventsQuery($followingIds);
        $trendingPostsQuery = $this->buildTrendingPostsQuery($followingIds);
        $popularEventsQuery = $this->buildPopularEventsQuery($followingIds);

        return $postsQuery
            ->union($eventsQuery)
            ->union($trendingPostsQuery)
            ->union($popularEventsQuery)
            ->orderBy('total_score', 'desc')
            ->orderBy('created_at', 'desc');
    }

    /**
     * Build posts query for followed users
     */
    private function buildPostsQuery(array $followingIds)
    {
        return DB::table('posts')
            ->select([
                'posts.id',
                DB::raw('posts.content as content'),
                'posts.image_url',
                'posts.video_url',
                'posts.likes_count',
                'posts.comments_count',
                'posts.shares_count',
                'posts.created_at',
                'posts.updated_at',
                'users.id as user_id',
                'users.name as user_name',
                'users.email as user_email',
                'events.id as event_id',
                'events.title as event_title',
                DB::raw('NULL as title'),
                DB::raw('NULL as description'),
                DB::raw('NULL as location'),
                DB::raw('NULL as start_date'),
                DB::raw('NULL as end_date'),
                DB::raw('NULL as start_time'),
                DB::raw('NULL as end_time'),
                DB::raw('NULL as category'),
                DB::raw('NULL as max_attendees'),
                DB::raw('NULL as price'),
                DB::raw('NULL as attendees_count'),
                DB::raw('NULL as posts_count'),
                DB::raw('NULL as available_slots'),
                DB::raw('(posts.likes_count + posts.comments_count * 3 + posts.shares_count * 2) as engagement_score'),
                DB::raw('GREATEST(0, 24 - TIMESTAMPDIFF(HOUR, posts.created_at, NOW())) as recency_score'),
                DB::raw('(posts.likes_count + posts.comments_count * 3 + posts.shares_count * 2 + GREATEST(0, 24 - TIMESTAMPDIFF(HOUR, posts.created_at, NOW()))) as total_score'),
                DB::raw('"post" as type'),
                DB::raw('1 as is_following'),
                DB::raw('0 as is_trending'),
                DB::raw('0 as is_popular')
            ])
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('events', 'posts.event_id', '=', 'events.id')
            ->where('posts.is_active', true)
            ->whereIn('posts.user_id', $followingIds);
    }

    /**
     * Build events query for followed users
     */
    private function buildEventsQuery(array $followingIds)
    {
        return DB::table('events')
            ->select([
                'events.id',
                DB::raw('NULL as content'),
                'events.image_url',
                DB::raw('NULL as video_url'),
                DB::raw('NULL as likes_count'),
                DB::raw('NULL as comments_count'),
                DB::raw('NULL as shares_count'),
                'events.created_at',
                'events.updated_at',
                'users.id as user_id',
                'users.name as user_name',
                'users.email as user_email',
                DB::raw('NULL as event_id'),
                DB::raw('NULL as event_title'),
                'events.title',
                'events.description',
                'events.location',
                'events.start_date',
                'events.end_date',
                'events.start_time',
                'events.end_time',
                'events.category',
                'events.max_attendees',
                'events.price',
                DB::raw('(SELECT COUNT(*) FROM bookings WHERE event_id = events.id AND status = "confirmed") as attendees_count'),
                DB::raw('(SELECT COUNT(*) FROM posts WHERE event_id = events.id AND is_active = true) as posts_count'),
                DB::raw('(events.max_attendees - (SELECT COUNT(*) FROM bookings WHERE event_id = events.id AND status = "confirmed")) as available_slots'),
                DB::raw('((SELECT COUNT(*) FROM bookings WHERE event_id = events.id AND status = "confirmed") / GREATEST(events.max_attendees, 1) * 10 + (SELECT COUNT(*) FROM posts WHERE event_id = events.id AND is_active = true) * 2) as engagement_score'),
                DB::raw('GREATEST(0, 24 - TIMESTAMPDIFF(HOUR, events.created_at, NOW())) as recency_score'),
                DB::raw('((SELECT COUNT(*) FROM bookings WHERE event_id = events.id AND status = "confirmed") / GREATEST(events.max_attendees, 1) * 10 + (SELECT COUNT(*) FROM posts WHERE event_id = events.id AND is_active = true) * 2 + GREATEST(0, 24 - TIMESTAMPDIFF(HOUR, events.created_at, NOW()))) as total_score'),
                DB::raw('"event" as type'),
                DB::raw('1 as is_following'),
                DB::raw('0 as is_trending'),
                DB::raw('0 as is_popular')
            ])
            ->join('users', 'events.user_id', '=', 'users.id')
            ->where('events.is_active', true)
            ->whereIn('events.user_id', $followingIds);
    }

    /**
     * Build trending posts query
     */
    private function buildTrendingPostsQuery(array $followingIds)
    {
        return DB::table('posts')
            ->select([
                'posts.id',
                DB::raw('posts.content as content'),
                'posts.image_url',
                'posts.video_url',
                'posts.likes_count',
                'posts.comments_count',
                'posts.shares_count',
                'posts.created_at',
                'posts.updated_at',
                'users.id as user_id',
                'users.name as user_name',
                'users.email as user_email',
                'events.id as event_id',
                'events.title as event_title',
                DB::raw('NULL as title'),
                DB::raw('NULL as description'),
                DB::raw('NULL as location'),
                DB::raw('NULL as start_date'),
                DB::raw('NULL as end_date'),
                DB::raw('NULL as start_time'),
                DB::raw('NULL as end_time'),
                DB::raw('NULL as category'),
                DB::raw('NULL as max_attendees'),
                DB::raw('NULL as price'),
                DB::raw('NULL as attendees_count'),
                DB::raw('NULL as posts_count'),
                DB::raw('NULL as available_slots'),
                DB::raw('(posts.likes_count + posts.comments_count * 3 + posts.shares_count * 2) as engagement_score'),
                DB::raw('GREATEST(0, 24 - TIMESTAMPDIFF(HOUR, posts.created_at, NOW())) as recency_score'),
                DB::raw('(posts.likes_count + posts.comments_count * 3 + posts.shares_count * 2 + GREATEST(0, 24 - TIMESTAMPDIFF(HOUR, posts.created_at, NOW()))) as total_score'),
                DB::raw('"post" as type'),
                DB::raw('0 as is_following'),
                DB::raw('1 as is_trending'),
                DB::raw('0 as is_popular')
            ])
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('events', 'posts.event_id', '=', 'events.id')
            ->where('posts.is_active', true)
            ->whereNotIn('posts.user_id', $followingIds)
            ->orderBy('engagement_score', 'desc')
            ->limit(3);
    }

    /**
     * Build popular events query
     */
    private function buildPopularEventsQuery(array $followingIds)
    {
        return DB::table('events')
            ->select([
                'events.id',
                DB::raw('NULL as content'),
                'events.image_url',
                DB::raw('NULL as video_url'),
                DB::raw('NULL as likes_count'),
                DB::raw('NULL as comments_count'),
                DB::raw('NULL as shares_count'),
                'events.created_at',
                'events.updated_at',
                'users.id as user_id',
                'users.name as user_name',
                'users.email as user_email',
                DB::raw('NULL as event_id'),
                DB::raw('NULL as event_title'),
                'events.title',
                'events.description',
                'events.location',
                'events.start_date',
                'events.end_date',
                'events.start_time',
                'events.end_time',
                'events.category',
                'events.max_attendees',
                'events.price',
                DB::raw('(SELECT COUNT(*) FROM bookings WHERE event_id = events.id AND status = "confirmed") as attendees_count'),
                DB::raw('(SELECT COUNT(*) FROM posts WHERE event_id = events.id AND is_active = true) as posts_count'),
                DB::raw('(events.max_attendees - (SELECT COUNT(*) FROM bookings WHERE event_id = events.id AND status = "confirmed")) as available_slots'),
                DB::raw('((SELECT COUNT(*) FROM bookings WHERE event_id = events.id AND status = "confirmed") / GREATEST(events.max_attendees, 1) * 10 + (SELECT COUNT(*) FROM posts WHERE event_id = events.id AND is_active = true) * 2) as engagement_score'),
                DB::raw('GREATEST(0, 24 - TIMESTAMPDIFF(HOUR, events.created_at, NOW())) as recency_score'),
                DB::raw('((SELECT COUNT(*) FROM bookings WHERE event_id = events.id AND status = "confirmed") / GREATEST(events.max_attendees, 1) * 10 + (SELECT COUNT(*) FROM posts WHERE event_id = events.id AND is_active = true) * 2 + GREATEST(0, 24 - TIMESTAMPDIFF(HOUR, events.created_at, NOW()))) as total_score'),
                DB::raw('"event" as type'),
                DB::raw('0 as is_following'),
                DB::raw('0 as is_trending'),
                DB::raw('1 as is_popular')
            ])
            ->join('users', 'events.user_id', '=', 'users.id')
            ->where('events.is_active', true)
            ->whereNotIn('events.user_id', $followingIds)
            ->orderBy('attendees_count', 'desc')
            ->limit(2);
    }

    /**
     * Transform raw database results to API format
     */
    private function transformFeedItems($feedItems)
    {
        return $feedItems->map(function ($item) {
            $baseItem = [
                'id' => $item->id,
                'type' => $item->type,
                'user' => [
                    'id' => $item->user_id,
                    'name' => $item->user_name,
                    'email' => $item->user_email,
                ],
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'is_following' => (bool) $item->is_following,
                'is_trending' => (bool) $item->is_trending,
                'is_popular' => (bool) $item->is_popular,
                'engagement_score' => $item->engagement_score,
            ];

            if ($item->type === 'post') {
                $baseItem = array_merge($baseItem, [
                    'content' => $item->content,
                    'image_url' => $item->image_url,
                    'video_url' => $item->video_url,
                    'likes_count' => $item->likes_count,
                    'comments_count' => $item->comments_count,
                    'shares_count' => $item->shares_count,
                ]);

                if ($item->event_id) {
                    $baseItem['event'] = [
                        'id' => $item->event_id,
                        'title' => $item->event_title,
                    ];
                }
            } else {
                $baseItem = array_merge($baseItem, [
                    'title' => $item->title,
                    'description' => $item->description,
                    'location' => $item->location,
                    'start_date' => $item->start_date,
                    'end_date' => $item->end_date,
                    'start_time' => $item->start_time,
                    'end_time' => $item->end_time,
                    'category' => $item->category,
                    'image_url' => $item->image_url,
                    'max_attendees' => $item->max_attendees,
                    'price' => $item->price,
                    'attendees_count' => $item->attendees_count,
                    'available_slots' => $item->available_slots,
                ]);
            }

            return $baseItem;
        });
    }

    /**
     * Clear feed cache for a user
     */
    public function clearUserFeedCache(User $user): void
    {
        $pattern = "user_feed_{$user->id}_*";
        Cache::forget($pattern);
    }

    /**
     * Clear all feed cache
     */
    public function clearAllFeedCache(): void
    {
        Cache::flush();
    }
}
