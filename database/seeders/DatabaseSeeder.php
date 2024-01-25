<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Home Page
        \App\Models\Home\HeroContent::factory(5)->create();
        \App\Models\Home\AnnouncementBanner::factory(1)->create();
        \App\Models\Home\ProgramsContent::factory(4)->create();
        \App\Models\Home\AboutContent::factory(1)->create();

        // About Page
        \App\Models\About\Banner::factory(1)->create();
        \App\Models\About\InfoList::factory(3)->create();
        \App\Models\About\MainContent::factory(1)->create();

        \App\Models\General\Post::factory(10)->create();
        \App\Models\General\Event::factory(10)->create();
    }
}
