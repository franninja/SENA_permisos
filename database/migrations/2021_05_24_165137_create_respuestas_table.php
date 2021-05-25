<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('respuestas', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        DB::statement('
            
            CREATE TABLE `respuestas` (
                `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
                `f_finalizacion` datetime DEFAULT NULL,
                `consentimiento` varchar(255) DEFAULT NULL,
                `fecha` date DEFAULT NULL,
                `nombre` varchar(255) DEFAULT NULL,
                `edad` tinyint(3) UNSIGNED DEFAULT NULL,
                `tipo_doc` varchar(100) DEFAULT NULL,
                `n_documento` bigint(12) DEFAULT NULL,
                `correo` varchar(255) DEFAULT NULL,
                `n_celuar` bigint(11) DEFAULT NULL,
                `modalidad_trabajo` varchar(255) DEFAULT NULL,
                `direccion` varchar(255) DEFAULT NULL,
                `region` varchar(255) DEFAULT NULL,
                `centro` varchar(255) DEFAULT NULL,
                `tipo_sede` varchar(255) DEFAULT NULL,
                `nombre_subsede` varchar(255) DEFAULT NULL,
                `tipo_vinculacion` varchar(255) DEFAULT NULL,
                `nombre_empresa` varchar(255) DEFAULT NULL,
                `cargo` varchar(255) DEFAULT NULL,
                `positivo_covid19` varchar(5) DEFAULT NULL,
                `fecha_resultado` date DEFAULT NULL,
                `genero` varchar(255) DEFAULT NULL,
                `actualmente_embarazada` varchar(5) DEFAULT NULL,
                `en_periodo_lactancia` varchar(5) DEFAULT NULL,
                `presenta_enfermedades` varchar(5) DEFAULT NULL,
                `cual_enfermedad` varchar(255) DEFAULT NULL,
                `tratamiento_debilita_sistema_inmune` tinytext DEFAULT NULL,
                `cual_tratamiento` varchar(255) DEFAULT NULL,
                `contacto_estrecho` tinytext DEFAULT NULL,
                `fiebre_38` tinytext DEFAULT NULL,
                `fiebre_14_dias` tinytext DEFAULT NULL,
                `tos_persistente` tinytext DEFAULT NULL,
                `dificultad_respiratoria` tinytext DEFAULT NULL,
                `fatiga_debilidad` tinytext DEFAULT NULL,
                `perdida_olfato_gusto` tinytext DEFAULT NULL,
                `dolor_cabeza` tinytext DEFAULT NULL,
                `dolor_pecho` tinytext DEFAULT NULL,
                `nauceas_diarrea` tinytext DEFAULT NULL,
                `dolor_garganta` tinytext DEFAULT NULL,
                `vacunado_covid` tinytext DEFAULT NULL,
                `f_primera_dosis` date DEFAULT NULL,
                `segunda_dosis` tinytext DEFAULT NULL,
                `f_segunda_dosis` date DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
    }
}
