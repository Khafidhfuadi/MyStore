<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\Product;

class ProductTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 10)->create();
    }
}
