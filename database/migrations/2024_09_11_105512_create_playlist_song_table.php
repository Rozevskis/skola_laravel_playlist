<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('playlist_song', function (Blueprint $table) {
            $table->unsignedInteger('playlist_id');
            $table->unsignedInteger('song_id');

            $table->foreign('playlist_id')->references('id')->on('playlist')->onDelete('cascade');
            $table->foreign('song_id')->references('id')->on('song')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist_song');
    }
};
