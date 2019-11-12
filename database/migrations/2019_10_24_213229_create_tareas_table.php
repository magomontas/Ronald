<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('apellidos');
            $table->boolean('isAdmin')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('materias', function (Blueprint $table) {
            $table->bigIncrements('idmateria');
            $table->string('nombre');
            $table->text('descripcion');
            $table->text('codigo');
            $table->bigInteger('user_id')->unsigned();
//          clave foreana de la tabla usuario
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('clases', function (Blueprint $table) {
            $table->bigIncrements('idclase');
            $table->string('nombre');
            $table->text('tareas')->nullable();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('materia_id')->references('idmateria')->on('materias')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('tareas', function (Blueprint $table) {
            $table->bigIncrements('idtareas');
            $table->text('titulo');
            $table->text('contenido');
            $table->unsignedBigInteger('materias_id');
            $table->foreign('materias_id')->references('idmateria')->on('materias');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('clases_id');
            $table->foreign('clases_id')->references('idclase')->on('clases');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
        Schema::dropIfExists('users');
        Schema::dropIfExists('materias');
        Schema::dropIfExists('clases');
    }
}
