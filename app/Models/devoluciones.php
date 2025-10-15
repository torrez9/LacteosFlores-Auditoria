<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class devoluciones extends Model
{
    
    use HasFactory;
    protected $table = 'devoluciones';

    protected $fillable = [
        'fechadevolucion',
        'totaldevolucion',
        'motivodevolucion',
        'accionestomada',
        'idfactura'
    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'idfactura');
    }

    public function detallesDevoluciones()
    {
        return $this->hasMany(detalledevolucion::class, 'iddevolucion');
    }
}
