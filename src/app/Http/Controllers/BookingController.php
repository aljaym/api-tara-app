<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Booking::with(['user', 'event'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc');

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $bookings = $query->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $bookings
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'event_id' => 'required|exists:events,id',
                'attendees_count' => 'required|integer|min:1',
                'special_requirements' => 'nullable|string',
                'attendee_info' => 'nullable|array'
            ]);

            $event = Event::findOrFail($validated['event_id']);

            // Check if event is active
            if (!$event->is_active) {
                return response()->json([
                    'success' => false,
                    'message' => 'Event is not available for booking'
                ], 400);
            }

            // Check if event has available slots
            if ($event->isFullyBooked()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Event is fully booked'
                ], 400);
            }

            // Check if user already has a booking for this event
            $existingBooking = Booking::where('user_id', auth()->id())
                ->where('event_id', $validated['event_id'])
                ->whereIn('status', ['pending', 'confirmed'])
                ->first();

            if ($existingBooking) {
                return response()->json([
                    'success' => false,
                    'message' => 'You already have a booking for this event'
                ], 400);
            }

            $validated['user_id'] = auth()->id();
            $validated['status'] = 'pending';
            $validated['total_amount'] = $event->price * $validated['attendees_count'];
            $validated['payment_status'] = 'pending';

            $booking = Booking::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Booking created successfully',
                'data' => $booking->load(['user', 'event'])
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
                'message' => 'Failed to create booking',
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
            $booking = Booking::with(['user', 'event'])
                ->where('user_id', auth()->id())
                ->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $booking
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Booking not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $booking = Booking::findOrFail($id);

            // Check if user owns the booking
            if ($booking->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized to update this booking'
                ], 403);
            }

            $validated = $request->validate([
                'attendees_count' => 'sometimes|integer|min:1',
                'special_requirements' => 'nullable|string',
                'attendee_info' => 'nullable|array'
            ]);

            // Recalculate total amount if attendees count changed
            if (isset($validated['attendees_count'])) {
                $validated['total_amount'] = $booking->event->price * $validated['attendees_count'];
            }

            $booking->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Booking updated successfully',
                'data' => $booking->load(['user', 'event'])
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
                'message' => 'Failed to update booking',
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
            $booking = Booking::findOrFail($id);

            // Check if user owns the booking
            if ($booking->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized to cancel this booking'
                ], 403);
            }

            // Only allow cancellation if booking is pending or confirmed
            if (!in_array($booking->status, ['pending', 'confirmed'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot cancel this booking'
                ], 400);
            }

            $booking->update(['status' => 'cancelled']);

            return response()->json([
                'success' => true,
                'message' => 'Booking cancelled successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to cancel booking',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
