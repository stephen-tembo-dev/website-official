<?php

namespace Database\Factories\Home;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Home\AboutContent>
 */
class AboutContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_path' => 'images/banner-zuct-' . rand(2, 5) . 'jpg',
            'title' => fake()->text(35),
            'text' => fake()->paragraph(),
            'video_url' => fake()->url()
        ];
    }
}
