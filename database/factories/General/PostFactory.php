<?php

namespace Database\Factories\General;

use App\Enums\PostStatusEnum;
use App\Enums\PostTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\General\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(PostTypeEnum::toArray()),
            'image_path' => 'images/banner-zuct-' . rand(2, 5) . 'jpg',
            'title' => fake()->text(),
            'text' => fake()->paragraph(5),
            'status' => fake()->randomElement(PostStatusEnum::toArray()),
            'video_url' => fake()->url(),
            'attachment_path' => 'images/banner-zuct-' . rand(2, 5) . 'jpg',
            'published_at' => fake()->date(),
        ];
    }
}
