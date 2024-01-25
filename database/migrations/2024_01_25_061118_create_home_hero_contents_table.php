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
        Schema::create('home_hero_contents', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->string('title');
            $table->text('text');
            $table->string('cta_text', 100)->nullable();
            $table->string('cta_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_hero_contents');
    }
};
