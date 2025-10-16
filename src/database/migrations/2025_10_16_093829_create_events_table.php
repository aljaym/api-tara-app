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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->datetime('start_date');
            $table->datetime('end_date')->nullable();
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->string('category');
            $table->string('image_url')->nullable();
            $table->integer('max_attendees')->default(0);
            $table->decimal('price', 10, 2)->default(0);
            $table->boolean('is_live')->default(false);
            $table->boolean('is_active')->default(true);
            $table->json('itinerary')->nullable(); // Store detailed itinerary as JSON
            $table->json('requirements')->nullable(); // Store requirements as JSON
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
