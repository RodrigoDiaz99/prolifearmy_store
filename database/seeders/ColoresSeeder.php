<?php

namespace Database\Seeders;

use App\Models\Colores;
use Illuminate\Database\Seeder;

class ColoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color1 = Colores::create([
            'color' => 'Negro',

        ]);
        $color2 = Colores::create([
            'color' => 'Azul',

        ]);
        $color3 = Colores::create([
            'color' => 'Marron',

        ]);
        $color4 = Colores::create([
            'color' => 'Gris',

        ]);
        $color5 = Colores::create([
            'color' => 'Verde',

        ]);
        $color6 = Colores::create([
            'color' => 'Naranja',

        ]);
        $color7 = Colores::create([
            'color' => 'Rosa',

        ]);
        $color8 = Colores::create([
            'color' => 'Purpura',

        ]);
        $color9 = Colores::create([
            'color' => 'Rojo',

        ]);
        $color10 = Colores::create([
            'color' => 'Blanco',

        ]);
        $color11 = Colores::create([
            'color' => 'Amarillo',

        ]);
        $color12 = Colores::create([
            'color' => 'Celeste',

        ]);

    }
}
