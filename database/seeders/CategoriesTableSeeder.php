<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "name"          => "politica",
                "description"   => "Lorem picsum",
            ],
            [
                "name"          => "attualità",
                "description"   => "Lorem picsum",
            ],
            [
                "name"          => "cucina",
                "description"   => "Lorem picsum",
            ],
            [
                "name"          => "informatica",
                "description"   => "Lorem picsum",
            ],
            [
                "name"          => "scuola",
                "description"   => "Lorem picsum",
            ],
            [
                "name"          => "cronaca",
                "description"   => "Lorem picsum",
            ],
        ];

        foreach($categories as $category) {
            Category::create($category);
        }
    }
}