<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name' => 'general',
            'description' => 'cualquier persona dentro de la plataforma puede verla'
        ]);
        Area::create([
            'name' => 'software',
            'description' => 'para areas especializadas en la industria 4.0 o de innovacion'
        ]);
        Area::create([
            'name' => 'marketing',
            'description' => 'para areas especializadas en las ventas y venta de productos por intenet'
        ]);
        Area::create([
            'name' => 'construccion',
            'description' => 'para areas especializadas en la realizacion de estructuras y edificios'
        ]);
    }
}
