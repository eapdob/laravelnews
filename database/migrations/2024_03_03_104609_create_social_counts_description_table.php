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
        Schema::create('social_counts_description', function (Blueprint $table) {
            $table->id();
            $table->foreignId('social_count_id')->constrained('social_counts')->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->string('fan_count');
            $table->string('fan_type');
            $table->string('button_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_counts_description');
    }
};
