<?php

namespace Database\Factories\About;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About\Banner>
 */
class AboutBannerFactory extends Factory
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
            'title' => fake()->text(30),
            'caption' => fake()->text('20')
        ];
    }
}
