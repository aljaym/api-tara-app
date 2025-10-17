<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add indexes for feed performance optimization
        Schema::table('posts', function (Blueprint $table) {
            // Composite index for feed queries
            $table->index(['user_id', 'is_active', 'created_at'], 'posts_feed_index');
            
            // Index for engagement scoring
            $table->index(['is_active', 'likes_count', 'comments_count', 'shares_count'], 'posts_engagement_index');
            
            // Index for trending posts
            $table->index(['is_active', 'created_at'], 'posts_trending_index');
        });

        Schema::table('events', function (Blueprint $table) {
            // Composite index for feed queries
            $table->index(['user_id', 'is_active', 'created_at'], 'events_feed_index');
            
            // Index for popular events
            $table->index(['is_active', 'created_at'], 'events_popular_index');
        });

        Schema::table('bookings', function (Blueprint $table) {
            // Index for attendee count calculations
            $table->index(['event_id', 'status'], 'bookings_attendee_index');
        });

        Schema::table('follows', function (Blueprint $table) {
            // Index for follower queries
            $table->index(['follower_id', 'created_at'], 'follows_follower_index');
            
            // Index for following queries
            $table->index(['following_id', 'created_at'], 'follows_following_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('posts_feed_index');
            $table->dropIndex('posts_engagement_index');
            $table->dropIndex('posts_trending_index');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex('events_feed_index');
            $table->dropIndex('events_popular_index');
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->dropIndex('bookings_attendee_index');
        });

        Schema::table('follows', function (Blueprint $table) {
            $table->dropIndex('follows_follower_index');
            $table->dropIndex('follows_following_index');
        });
    }
};
