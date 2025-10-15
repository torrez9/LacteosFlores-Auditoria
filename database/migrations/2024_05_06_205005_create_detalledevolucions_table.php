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
        Schema::create('detalledevolucions', function (Blueprint $table) {
            $table->id('id_detalledevs');
            $table->integer('cantidadD');
            $table->decimal('precio',10,2);
            $table->unsignedBigInteger('idproducto');
            $table->foreign('idproducto')->references('id_producto')->on('productos');
            $table->unsignedBigInteger('iddevolucion');
            $table->foreign('iddevolucion')->references('id_devolucion')->on('devoluciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalledevolucions');
    }
};
