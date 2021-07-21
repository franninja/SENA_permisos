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
            create table Challenges(
                id bigint(20) primary key auto_increment not null,
                user_id bigint(20) unsigned not null,
                name varchar(255) not null,
                privacity bigint(20) unsigned not null,
                description text not null,  
                status varchar(15) null,
                created_at TIMESTAMP NULL ,
                updated_at TIMESTAMP NULL ,
                foreign key (user_id) references users(id),
                foreign key (privacity) references roles(id)
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
