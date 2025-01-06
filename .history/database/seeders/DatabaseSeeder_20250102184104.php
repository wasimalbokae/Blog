<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=>hash::make('admin'),
            'is_admin'=>true,
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmOHtQgVJYHxVOh9Nn-s9Soc_V6fSL8KTHUA&s',
        ]);
        Category::create([
            'title' => 'Other',
            'description' => 'Other'
        ]);
        Tag::create(['word' => '#Tags']);
    }
}
