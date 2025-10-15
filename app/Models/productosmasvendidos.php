<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productosmasvendidos extends Model
{
    use HasFactory;
    protected $table = 'productos_mas_vendidos'; // Aquí se coloca la vista de la BD
}
