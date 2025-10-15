<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarioconmasventas extends Model
{
    use HasFactory;
    protected $table = 'usuario_maximas_ventas'; // Aquí se coloca la vista de la BD
}
