<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id', 'fk_municipio_cliente')->references('id')->on('municipios')->onDelete('restrict')->onUpdate('restrict');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('identificacion')->unique();
            $table->integer('celular');
            $table->string('email');
            $table->boolean('habeas')->default(0);
            $table->boolean('ganador')->default(0);
            $table->timestamps();
            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
