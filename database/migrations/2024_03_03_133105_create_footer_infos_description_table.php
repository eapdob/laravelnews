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
        Schema::create('footer_infos_description', function (Blueprint $table) {
            $table->id();
            $table->foreignId('footer_info_id')->constrained('footer_infos')->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->text('description');
            $table->string('copyright');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_infos_description');
    }
};
