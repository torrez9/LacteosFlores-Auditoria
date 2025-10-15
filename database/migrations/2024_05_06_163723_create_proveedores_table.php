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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('id_proveedores');
            $table->string('cedula',16)->unique();
            $table->tinyInteger('estado')->default(1);
            $table->string('ruc',15)->unique();
            $table->string('razonsocial',100);
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('direccion',100);
            $table->integer('telefono');
            $table->string('email',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
