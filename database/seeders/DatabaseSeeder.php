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

    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            TagsTableSeeder::class,
            CategoriesTableSeeder::class,
        ]);
        User::factory(10)->create();


    }
}
