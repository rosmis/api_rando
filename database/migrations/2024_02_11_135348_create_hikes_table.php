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
        Schema::create('hikes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('excerpt');
            $table->text('description');
            $table->string('activity_type');
            $table->string('difficulty');
            $table->unsignedInteger('distance');
            $table->string('duration');
            $table->unsignedInteger('positive_elevation');
            $table->unsignedInteger('negative_elevation');
            $table->string('municipality');
            $table->unsignedInteger('highest_point');
            $table->unsignedInteger('lowest_point');
            $table->string('location');
            $table->string('ign_reference')->nullable();
            $table->string('hike_url')->nullable();
            $table->boolean('is_return_starting_point')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hikes');
    }
};
