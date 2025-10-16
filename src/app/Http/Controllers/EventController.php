<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Event::with(['user', 'bookings'])
            ->where('is_active', true)
            ->orderBy('start_date', 'asc');

        // Filter by category
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Filter by location (search)
        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // Filter by date range
        if ($request->has('start_date')) {
            $query->where('start_date', '>=', $request->start_date);
        }

        if ($request->has('end_date')) {
            $query->where('start_date', '<=', $request->end_date);
        }

        $events = $query->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $events
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string|max:255',
                'latitude' => 'nullable|numeric|between:-90,90',
                'longitude' => 'nullable|numeric|between:-180,180',
                'start_date' => 'required|date|after:now',
                'end_date' => 'nullable|date|after:start_date',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'nullable|date_format:H:i|after:start_time',
                'category' => 'required|string|max:100',
                'image_url' => 'nullable|url',
                'max_attendees' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
                'itinerary' => 'nullable|array',
                'requirements' => 'nullable|array'
            ]);

            $validated['user_id'] = auth()->id();
            $validated['is_live'] = false;
            $validated['is_active'] = true;

            $event = Event::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Event created successfully',
                'data' => $event->load('user')
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
                'message' => 'Failed to create event',
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
            $event = Event::with(['user', 'bookings', 'posts'])
                ->where('is_active', true)
                ->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $event
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $event = Event::findOrFail($id);

            // Check if user owns the event
            if ($event->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized to update this event'
                ], 403);
            }

            $validated = $request->validate([
                'title' => 'sometimes|string|max:255',
                'description' => 'sometimes|string',
                'location' => 'sometimes|string|max:255',
                'latitude' => 'nullable|numeric|between:-90,90',
                'longitude' => 'nullable|numeric|between:-180,180',
                'start_date' => 'sometimes|date|after:now',
                'end_date' => 'nullable|date|after:start_date',
                'start_time' => 'sometimes|date_format:H:i',
                'end_time' => 'nullable|date_format:H:i|after:start_time',
                'category' => 'sometimes|string|max:100',
                'image_url' => 'nullable|url',
                'max_attendees' => 'sometimes|integer|min:1',
                'price' => 'sometimes|numeric|min:0',
                'itinerary' => 'nullable|array',
                'requirements' => 'nullable|array'
            ]);

            $event->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Event updated successfully',
                'data' => $event->load('user')
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
                'message' => 'Failed to update event',
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
            $event = Event::findOrFail($id);

            // Check if user owns the event
            if ($event->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized to delete this event'
                ], 403);
            }

            $event->update(['is_active' => false]);

            return response()->json([
                'success' => true,
                'message' => 'Event deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete event',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get user's events
     */
    public function myEvents(): JsonResponse
    {
        $events = Event::with(['user', 'bookings'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $events
        ]);
    }
}
