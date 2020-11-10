<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;

class CategorySeeder extends Seeder
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'Доски и лыжи',
                'img'  => 'category-1.jpg',
            ],
            [
                'name' => 'Крепления',
                'img'  => 'category-2.jpg',
            ],
            [
                'name' => 'Ботинки',
                'img'  => 'category-3.jpg',
            ],
            [
                'name' => 'Одежда',
                'img'  => 'category-4.jpg',
            ],
            [
                'name' => 'Инструменты',
                'img'  => 'category-5.jpg',
            ],
            [
                'name' => 'Разное',
                'img'  => 'category-6.jpg',
            ],
        ];

        foreach ($items as $item) {
            Category::create($item);
        }
    }
}
