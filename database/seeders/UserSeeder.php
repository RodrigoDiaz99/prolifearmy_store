<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = User::create([
            'first_name' => 'Servicios',
            'second_name' => '',
            'first_last_name' => 'Informaticos',
            'second_last_name' => 'Peninsula',
            'email' => 'store@serviciospeninsula.xyz',

            'password' => Hash::make('serviciospeninsula12'),
            'email_verified_at'=>'2021-06-01 19:07:38',

        ]);
        $super->assignRole('Admin');
         $super2 = User::create([
            'first_name' => 'Carlos',
            'second_name' => '',
            'first_last_name' => 'Ramirez',
            'second_last_name' => 'Null',
            'email' => 'carlosramirez@mymexicanshop.com',

            'password' => Hash::make('Secret12'),
            'email_verified_at'=>'2021-06-01 19:07:38',

        ]);
        $super2->assignRole('Admin');

        $super3 = User::create([
            'first_name' => 'Lulu',
            'second_name' => '',
            'first_last_name' => 'Martinez',
            'second_last_name' => 'Null',
            'email' => 'lulumartinez@mymexicanshop.com',

            'password' => Hash::make('Secret12'),
            'email_verified_at'=>'2021-06-01 19:07:38',

        ]);
        $super3->assignRole('Admin');

        $super4 = User::create([
            'first_name' => 'Uriel',
            'second_name' => '',
            'first_last_name' => 'Esqueda',
            'second_last_name' => 'Null',
            'email' => 'urielesqueda@mymexicanshop.com',

            'password' => Hash::make('Secret12'),
            'email_verified_at'=>'2021-06-01 19:07:38',

        ]);
        $super4->assignRole('Admin');


    }
}
