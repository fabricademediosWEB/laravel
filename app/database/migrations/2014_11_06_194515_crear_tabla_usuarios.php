<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->increments('id');

			//Foreign Keys
			
			//Foreign Key oficina
			$table->unsignedInteger('id_oficina');
			$table->foreign('id_oficina')->references('id')->on('oficinas');

			//Foreign Key rol
			$table->unsignedInteger('id_rol');
			$table->foreign('id_rol')->references('id')->on('roles');

			//Foreign Key estado
			$table->unsignedInteger('id_estado');
			$table->foreign('id_estado')->references('id')->on('estados');

			//Fecha y hora de creación
			$table->timestamps();

			//Email
			$table->string('email',62);

			//Password
			$table->string('password',32);

			//Nombre y apellido
			$table->string('nombre', 30);		
			$table->string('apellido', 30);

			//llave de validación
			$table->string('random', 13);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}

