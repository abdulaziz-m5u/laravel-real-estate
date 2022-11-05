<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'name' => 'For Sale',
                'slug' => 'for-sale'
            ],
            [
                'id'    => 2,
                'name' => 'For Rent',
                'slug' => 'for-rent'
            ],
        ];

        Category::insert($roles);
    }
}
