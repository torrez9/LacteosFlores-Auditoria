<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    use HasFactory;
    protected $table ='proveedores';
    protected $primaryKey = 'id_proveedores';
    protected $fillable = [
        'cedula',
        'estado',
        'ruc',
        'razonsocial',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'email'];

        public function productos()
        {
            return $this->hasMany(Producto::class, 'idproveedor');
        }
}
