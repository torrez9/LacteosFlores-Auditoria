<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleDevolucion extends Model
{
    protected $table = 'detalledevolucions';

    protected $fillable = [
        'cantidadD',
        'precio',
        'idproducto',
        'iddevolucion'
    ];

    public function devolucion()
    {
        return $this->belongsTo(Devoluciones::class, 'iddevolucion');
    }

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'idproducto');
    }
}
