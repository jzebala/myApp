<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category();
        $category->name = "Programowanie";
        $category->save();

        $category = new \App\Category();
        $category->name = "Laravel";
        $category->save();

        $category = new \App\Category();
        $category->name = "PHP";
        $category->save();
    }
}
