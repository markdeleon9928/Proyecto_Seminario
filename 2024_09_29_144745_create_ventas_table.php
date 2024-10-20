<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id(); // Llave primaria

            // Cambiar 'producto_id' por 'nombre_producto'
            $table->string('nombre_producto');
            $table->foreign('nombre_producto')->references('nombre_producto')->on('productos')->onDelete('cascade');

            $table->decimal('precio_venta', 10, 2);
            $table->unsignedInteger('cantidad'); // Nueva columna para cantidad vendida
            $table->timestamp('fecha_venta')->useCurrent(); // Nueva columna para la fecha de venta
            $table->string('estado_venta')->default('completada'); // Nueva columna para el estado de la venta

            // Cambiar 'cliente_id' por 'nombre'
            $table->string('nombre');
            $table->foreign('nombre')->references('nombre')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
