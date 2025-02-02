<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title' => 'Category 1',
            'description' => 'Category 1'
        ]);
        Category::create([
            'title' => 'Category 2',
            'description' => 'Category 2'
        ]);
        Category::create([
            'title' => 'Other',
            'description' => 'Other'
        ]);
    }
}
