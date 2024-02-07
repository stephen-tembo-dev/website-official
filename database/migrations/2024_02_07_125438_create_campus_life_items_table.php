<?php

use App\Enums\CampusLifeItemType;
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
        Schema::create('campus_life_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->enum('type', CampusLifeItemType::toArray());
            $table->text('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campus_life_items');
    }
};
