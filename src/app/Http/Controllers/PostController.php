<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Post::with(['user', 'event'])
            ->where('is_active', true)
            ->orderBy('created_at', 'desc');

        // Filter by type
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        // Filter by event
        if ($request->has('event_id')) {
            $query->where('event_id', $request->event_id);
        }

        $posts = $query->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'content' => 'nullable|string',
                'image_url' => 'nullable|url',
                'video_url' => 'nullable|url',
                'type' => 'required|in:text,image,video,event_related',
                'event_id' => 'nullable|exists:events,id'
            ]);

            $validated['user_id'] = auth()->id();
            $validated['is_active'] = true;

            $post = Post::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Post created successfully',
                'data' => $post->load(['user', 'event'])
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create post',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $post = Post::with(['user', 'event'])
                ->where('is_active', true)
                ->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $post
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $post = Post::findOrFail($id);

            // Check if user owns the post
            if ($post->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized to update this post'
                ], 403);
            }

            $validated = $request->validate([
                'content' => 'sometimes|string',
                'image_url' => 'nullable|url',
                'video_url' => 'nullable|url',
                'type' => 'sometimes|in:text,image,video,event_related',
                'event_id' => 'nullable|exists:events,id'
            ]);

            $post->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Post updated successfully',
                'data' => $post->load(['user', 'event'])
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
                'message' => 'Failed to update post',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $post = Post::findOrFail($id);

            // Check if user owns the post
            if ($post->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized to delete this post'
                ], 403);
            }

            $post->update(['is_active' => false]);

            return response()->json([
                'success' => true,
                'message' => 'Post deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete post',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
