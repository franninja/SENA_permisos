<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->bigInteger('n_documento')->nullable();
        //     $table->tinyInteger('area_id');
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password')->nullable();
        //     $table->rememberToken();
        //     $table->foreign('area_id')->references('id')->on('areas');
        //     $table->timestamps();
        // });

        DB::statement("
            create table `users` (
                `id` bigint unsigned not null auto_increment primary key, 
                `n_documento` bigint null, 
                `area_id` tinyint(255) null, 
                `name` varchar(255) not null, 
                `email` varchar(255) unique not null, 
                `email_verified_at` timestamp null, 
                `password` varchar(255) null, 
                `remember_token` varchar(100) null, 
                `created_at` timestamp null, 
                `updated_at` timestamp null,
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
        Schema::dropIfExists('users');
    }
}
