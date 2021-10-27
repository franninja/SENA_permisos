<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('ideas', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nombre');
        //     $table->string('descripcion');
        //     $table->string('archivo');

        //     $table->timestamps();
        // });

        DB::statement("
        create table ideas (
            id int primary key AUTO_INCREMENT not null,
            challenge_id bigint(20) not null,
            user_id bigint(20) unsigned not null,
            name varchar(255) not null,
            description text null,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL,
            foreign key (challenge_id) REFERENCES challenges (id),
            foreign key (user_id) references users(id)
        );
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ideas');
    }
}
