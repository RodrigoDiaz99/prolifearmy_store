<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
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
        CategoryProduct::create([
            'name' => 'Pañuelos'
        ]);

        CategoryProduct::create([
            'name' => 'Libros'
        ]);

        CategoryProduct::create([
            'name' => 'Gorras'
        ]);

        CategoryProduct::create([
            'name' => 'Playeras'
        ]);

        CategoryProduct::create([
            'name' => 'Sudaderas'
        ]);

        CategoryProduct::create([
            'name' => 'Ternos y Tazas'
        ]);
    }
}
