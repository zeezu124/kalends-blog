<?php

use App\Enums\CommentStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->enum('status', CommentStatus::toValues());
            $table->unsignedBigInteger('profile_id'); // Foreign key to the profiles table
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->unsignedBigInteger('playlist_id'); // Foreign key to the playlists table
            $table->foreign('playlist_id')->references('id')->on('playlists');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
