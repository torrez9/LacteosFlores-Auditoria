<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table ='usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'cedula',
        'usuario',
        'contraseña',
        'tipousuario',
        'estado',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'email'];

        // public function facturas()
        // {
        //     return $this->hasMany(factura::class, 'idusuario');
        // }

        
}
