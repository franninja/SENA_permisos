<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('challenges', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        DB::statement("
            create table challenges(
                id bigint(20) primary key auto_increment not null,
                area_id tinyint(255) not null,
                user_id bigint(20) unsigned not null,
                name varchar(255) ,
                description text not null,  
                status varchar(15) null,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL,
                foreign key (user_id) references users(id),
                foreign key (area_id) references areas(id)
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
        Schema::dropIfExists('challenges');
    }
}
