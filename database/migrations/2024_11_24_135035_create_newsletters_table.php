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
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->string('description')->nullable();
            $table->json('blocks');
            $table->string('author')->nullable();
            $table->timestamp('published_at')
                ->nullable()
                ->seconds(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletters');
    }
};