<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create(['word' => '#Tag 1']);
        Tag::create(['word' => '#Tag 2']);
        Tag::create(['word' => '#Tag 3']);



    }
}
