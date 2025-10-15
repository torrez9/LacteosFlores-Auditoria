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
        Schema::create('detallefacturas', function (Blueprint $table) {
            $table->id('id_detallefactura',20);
            $table->integer('cantidad');
            $table->decimal('precio',10,2);
            $table->decimal('importe',18,2);
            $table->unsignedBigInteger('idfactura');
            $table->foreign('idfactura')->references('id_factura')->on('facturas');
            $table->unsignedBigInteger('idproducto');
            $table->foreign('idproducto')->references('id_producto')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallefacturas');
    }
};
