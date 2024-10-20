<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('direccion')->nullable();
            $table->string('numero_celular')->nullable();
            $table->string('lugar_trabajo')->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->string('estado')->default('activo'); // Cambiado de enum a string
            $table->string('fuente_adquisicion')->nullable();
            $table->text('notas')->nullable();
            $table->timestamp('fecha_ultimo_contacto')->nullable();
            $table->string('tipo_cliente')->nullable(); // Cambiado de enum a string
            $table->string('direccion_envio')->nullable();
            $table->string('preferencias_comunicacion')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
