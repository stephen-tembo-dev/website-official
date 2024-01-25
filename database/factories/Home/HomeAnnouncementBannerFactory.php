<?php

namespace Database\Factories\Home;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Home\AnnouncementBanner>
 */
class HomeAnnouncementBannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(35),
            'text' => fake()->text()
        ];
    }
}
