<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FeedDiscoverController;
use App\Http\Controllers\FollowActionController;
use App\Http\Controllers\FollowListController;
use App\Http\Controllers\FollowStatusController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Health check endpoint
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'API is running',
        'timestamp' => now()->toISOString(),
        'version' => '1.0.10'
    ]);
});

// Public authentication routes
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// Public event routes (no authentication required for viewing)
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Authentication routes
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/user', [AuthController::class, 'user']);
    });
    
    Route::prefix('events')->group(function () {
        Route::get('my-events', [EventController::class, 'myEvents']); // must come before {id}
        Route::get('{id}', [EventController::class, 'show'])->whereNumber('id');
        Route::post('/', [EventController::class, 'store']);
        Route::put('{id}', [EventController::class, 'update']);
        Route::delete('{id}', [EventController::class, 'destroy']);
    });
    
    // Post routes
    Route::apiResource('posts', PostController::class);
    
    // Booking routes
    Route::apiResource('bookings', BookingController::class);
    
    // Follow routes - RESTful structure
    Route::get('/follow', [FollowController::class, 'index']); // Overview
    Route::post('/follow', [FollowActionController::class, 'store']); // Follow user
    Route::delete('/follow', [FollowActionController::class, 'destroy']); // Unfollow user
    Route::get('/follow/followers', [FollowListController::class, 'index']); // Get followers
    Route::get('/follow/following', [FollowListController::class, 'following']); // Get following
    Route::get('/follow/status', [FollowStatusController::class, 'show']); // Check status
    
    // Feed routes - RESTful structure
    Route::get('/feed', [FeedController::class, 'index']); // Get personalized feed
    Route::get('/feed/discover', [FeedDiscoverController::class, 'index']); // Discover content
    
    // Example protected route
    Route::get('/protected', function (Request $request) {
        return response()->json([
            'message' => 'This is a protected route',
            'user' => $request->user()
        ]);
    });
});
