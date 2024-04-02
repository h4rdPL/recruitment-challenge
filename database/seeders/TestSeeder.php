<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
/**
* Run the database seeds.
*/
public function run(): void
    {
        $categoryIds = Category::pluck('id')->toArray();

        Test::factory(4)->create()->each(function ($test) use ($categoryIds) {
            $test->categories()->attach($categoryIds);
        });
    }
}
