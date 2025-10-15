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
        Schema::create('devoluciones', function (Blueprint $table) {
            $table->id('id_devolucion',20);
            $table->date('fechadevolucion');
            $table->decimal('totaldevolucion',18,0);
            $table->string('motivodevolucion');
            $table->string('accionestomada');
            $table->unsignedBigInteger('idfactura');
            $table->foreign('idfactura')->references('id_factura')->on('facturas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devoluciones');
    }
};
