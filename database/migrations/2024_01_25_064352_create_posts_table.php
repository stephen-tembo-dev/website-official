<?php

use App\Enums\PostStatusEnum;
use App\Enums\PostTypeEnum;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->enum('type', PostTypeEnum::toArray())
                ->default(PostTypeEnum::News->value);
            $table->string('image_path');
            $table->string('title');
            $table->text('text');
            $table->enum('status', PostStatusEnum::toArray())
                ->default(PostStatusEnum::Draft->value);
            $table->string('video_url')->nullable();
            $table->string('attachment_path')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
