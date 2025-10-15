<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    use HasFactory;
    protected $table = 'compras';
    protected $primaryKey = 'id_compra';
    protected $fillable = [
        'fechacompra',
        'idproveedores',
        'idusuario',
        'Total',
    ];
    public function proveedor() {
        return $this->belongsTo(proveedores::class, 'id_proveedores');
    }

    public function detalleC() {
        return $this->hasMany(detallecompra::class, 'idcompra');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'idusuario');
    }
}
