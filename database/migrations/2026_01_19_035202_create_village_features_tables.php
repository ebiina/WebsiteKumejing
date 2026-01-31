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
        // Village Profile (History, Vision, Mission)
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();
            $table->longText('history')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->string('structure_image')->nullable();
            $table->string('location_map')->nullable(); // iframe link or similar
            $table->timestamps();
        });

        // Village Officials
        Schema::create('village_officials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('photo')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Posts (News and Agenda)
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('image')->nullable();
            $table->enum('type', ['news', 'agenda'])->default('news');
            $table->dateTime('event_date')->nullable(); // Specific for agenda
            $table->timestamps();
        });

        // Gallery
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Population Statistics (Simplified Aggregate)
        Schema::create('population_stats', function (Blueprint $table) {
            $table->id();
            $table->string('label'); // e.g., 'Total Population', 'Age 0-15'
            $table->integer('count');
            $table->string('category')->default('general'); // e.g., 'age', 'gender', 'general'
            $table->timestamps();
        });

        // Aspirations (Critics & Suggestions)
        Schema::create('aspirations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('message');
            $table->enum('status', ['pending', 'reviewed', 'hidden'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirations');
        Schema::dropIfExists('population_stats');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('village_officials');
        Schema::dropIfExists('village_profiles');
    }
};
