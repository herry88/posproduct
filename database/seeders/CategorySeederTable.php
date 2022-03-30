<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //category dummy
        $categories = [
            [
                'name' => 'Category 1',
            ],
            [
                'name' => 'Category 2',
            ],
            [
                'name' => 'Category 3',
            ],
            [
                'name' => 'Category 4',
            ],
            [
                'name' => 'Category 5',
            ],
            [
                'name' => 'Category 6',
            ],
            [
                'name' => 'Category 7',
            ],
            [
                'name' => 'Category 8',
            ],
            [
                'name' => 'Category 9',
            ],
            [
                'name' => 'Category 10',
            ],
            [
                'name' => 'Category 11'
            ]
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
