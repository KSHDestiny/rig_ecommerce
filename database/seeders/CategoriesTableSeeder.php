<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = new Category();
        $category1->name = 'Laptop';
        $category1->save();

        $category2 = new Category();
        $category2->name = 'Keyboard';
        $category2->save();

        $category3 = new Category();
        $category3->name = 'Mouse';
        $category3->save();

        $category4 = new Category();
        $category4->name = 'Monitor';
        $category4->save();
    }
}
