<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallecompra extends Model
{
    use HasFactory;
    protected $table = 'detallecompras';
    protected $primaryKey = 'id_detallecompra ';
    protected $fillable = [
        'idcompra  ',
        'idproducto ',
        'cantidad',
        'precio',
        'importe ',
    ];

    public function compra()
    {
        return $this->belongsTo(compra::class, 'idcompra');
    }
}
