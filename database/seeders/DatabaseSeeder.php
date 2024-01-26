<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Users\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Home Page
        // \App\Models\Home\HomeHeroContent::factory(5)->create();
        // \App\Models\Home\HomeAnnouncement::factory(1)->create();
        // \App\Models\Home\HomeAboutContent::factory(1)->create();

        // About Page
        // \App\Models\About\AboutBanner::factory(1)->create();
        // \App\Models\About\AboutInfoList::factory(3)->create();
        // \App\Models\About\AboutMainContent::factory(1)->create();

        // \App\Models\General\Post::factory(10)->create();
        // \App\Models\General\Event::factory(10)->create();

        // Users
        Role::insert([
            [
                'id' => 1845,
                'role_name' => 'editor',
            ],
            [
                'id' => 1745,
                'role_name' => 'viewer',
            ]
        ]);
    }
}
