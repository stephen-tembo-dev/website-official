<?php

namespace Database\Factories\General;

use App\Enums\EventStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\General\Event>
 */
class EventFactory extends Factory
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
            'title' => fake()->text(),
            'text' => fake()->paragraph(6),
            'venue' => fake()->text(),
            'date' => fake()->date(),
            'time' => fake()->time(),
            'attachment_path' => 'images/banner-zuct-' . rand(2, 5) . 'jpg',
            'status' => fake()->randomElement(EventStatusEnum::toArray()),
            'published_at' => fake()->date(),
        ];
    }
}
