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
        Schema::create('footer_grid_ones_description', function (Blueprint $table) {
            $table->id();
            $table->foreignId('footer_grid_one_id')->constrained('footer_grid_ones')->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_grid_ones_description');
    }
};
