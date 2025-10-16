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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed']);
            $table->integer('attendees_count')->default(1);
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->string('payment_status')->default('pending');
            $table->string('payment_method')->nullable();
            $table->text('special_requirements')->nullable();
            $table->json('attendee_info')->nullable(); // Store attendee details as JSON
            $table->timestamps();
            
            // Ensure one booking per user per event
            $table->unique(['user_id', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
