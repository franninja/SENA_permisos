<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = 'respuestas';

    protected $fillable = [
        'f_finalizacion', 
        'consentimiento', 
        'fecha',
        'nombre',
        'edad',
        'tipo_doc',
        'n_documento',
        'correo',
        'n_celuar',
        'modalidad_trabajo',
        'direccion',
        'region',
        'centro',
        'tipo_sede',
        'nombre_subsede',
        'tipo_vinculacion',
        'nombre_empresa',
        'cargo',
        'positivo_covid19',
        'fecha_resultado',
        'genero',
        'actualmente_embarazada',
        'en_periodo_lactancia',
        'presenta_enfermedades',
        'cual_enfermedad',
        'tratamiento_debilita_sistema_inmune',
        'cual_tratamiento',
        'contacto_estrecho',
        'fiebre_38',
        'fiebre_14_dias',
        'tos_persistente',
        'dificultad_respiratoria',
        'fatiga_debilidad',
        'perdida_olfato_gusto',
        'dolor_cabeza',
        'dolor_pecho',
        'nauceas_diarrea',
        'dolor_garganta',
        'vacunado_covid',
        'f_primera_dosis',
        'segunda_dosis',
        'f_segunda_dosis',
        
    ];
}			
