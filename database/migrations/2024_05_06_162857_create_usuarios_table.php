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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('cedula',16)->unique();
            $table->string('usuario',70);
            $table->string('contraseña',70);
            $table->string('tipousuario',30);
            $table->string('estado',70);
            $table->string('nombre',70);
            $table->string('apellido',70);
            $table->string('direccion',70);
            $table->integer('telefono');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
