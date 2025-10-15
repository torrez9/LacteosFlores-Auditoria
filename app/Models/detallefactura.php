<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallefactura extends Model
{
    use HasFactory;

    protected $table ='detallefacturas';
    protected $primaryKey = 'id_detallefactura';

    protected $fillable = [
        'cantidad',
        'precio',
        'idfactura',
        'idproducto',
        'importe'];

        public function producto()
        {
            return $this->belongsTo(detallefactura::class, 'idproducto');
        }

        public function factura()
        {
            return $this->belongsTo(factura::class, 'idfactura');
        }
}
