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
        Schema::create('hike_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hike_id');
            $table->foreign('hike_id')->references('id')->on('hikes')->cascadeOnDelete();
            $table->string('image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hike_images');
    }
};
