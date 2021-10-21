<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'n_documento' => '1000246741',
            'area_id' => 2,
            'name' => 'fran',
            'email' => 'fmcharris5@misena.edu.co',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'n_documento' => '1000246744',
            'area_id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345')
        ])->assignRole('admin');

        User::create([
            'n_documento' => '1000246745',
            'name' => 'prueba',
            'email' => 'prueba@prueba.com',
            'password' => bcrypt('12345')
        ]);
    }
}
