<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuesta;

class RespuestaController extends Controller
{
    public function save(Request $request){
        $data = json_decode($request->getContent());
        dump($data);

        die();

        foreach($data as $array_data) {
            $dato2 = $array_data['0'];
            $dato3 = $array_data['1'];
            $dato4 = $array_data['2'];
            $dato5 = 'practica';
            $dato6 = $array_data['3'];
            $dato7 = $array_data['7'];
            $dato8 = $array_data['8'];
        
            Respuesta::updateOrCreate(
                ['id' => $dato1?: NULL],
                [
                    'clase' => $dato2,
                    'fecha' => $dato3,
                    'hora' => $dato4,
                    'tipo' => $dato5,
                    'minutos_bloque' => $dato6,
                    'id_profesor' => $dato7,
                    'id_vehiculo' => $dato8
                ]
            );
        }
    }
}
