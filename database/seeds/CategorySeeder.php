<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
          'name' => 'Event',
          'slug' => str_slug('laravel')
        ]);

        Category::create([
          'name' => 'Press Release',
          'slug' => str_slug('pressrelease')
        ]);
    }
}
