<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    protected $primaryKey ='id_producto';

    protected $table ='productos';
    protected $fillable = [
    'descripcion',
    'cantidadprod',
    'precioventa',
    'idproveedor',];

    public function proveedor()
    {
        return $this->belongsTo(proveedores::class, 'idproveedor');
    }

    public function detallefact()
    {
        return $this->hasMany(detallefactura::class, 'idproveedor');
    }
    
}
