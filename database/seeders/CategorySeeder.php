<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Elegante','Estivo','Sportivo','Casual'];

        foreach($categories as $category_name){
            $category = new Category();
            $category->name = $category_name;
            $category->slug = Str::slug($category_name);
            $category->save();
        }
    }
}
