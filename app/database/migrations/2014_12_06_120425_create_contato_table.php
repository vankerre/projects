<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contato', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nome');
            $table->date('nascimento');
            $table->string('cpf');
            $table->string('tel_principal');
            $table->char('tipo_tel');
            $table->char('op');
            $table->integer('idade');
            $table->strinG('nome_res');
            $table->string('cpf_res');
            $table->string('email');
            $table->char('tipo_end');
            $table->string('cep');
            $table->string('estado');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('rua');
            $table->string('numero');
            $table->string('logradouro');
            $table->char('genero');
            $table->integer('estadoCivil');
            $table->string('mae');
            $table->string('pai');
            $table->char('filhos');
            $table->char('grupo');
            $table->string('caminho');
            $table->char('ativo');
            $table->char('exaluno');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('contato');
	}

}
