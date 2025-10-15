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
        Schema::create('detallecompras', function (Blueprint $table) {
            $table->id('id_detallecompra');
            $table->unsignedBigInteger('idcompra');
            $table->foreign('idcompra')->references('id_compra')->on('compras');
            $table->unsignedBigInteger('idproducto');
            $table->foreign('idproducto')->references('id_producto')->on('productos');
            $table->integer('cantidad');
            $table->decimal('precio',10,2);
            $table->decimal('importe',10,2);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallecompras');
    }
};
