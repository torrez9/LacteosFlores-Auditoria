<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;

    protected $table ='facturas';
    protected $primaryKey = 'id_factura';

    protected $fillable = [
        'fechafactura',
        'totalfactura',
        'estado',
        'idusuario' ];


        public function usuario()
        {
            return $this->belongsTo(User::class, 'idusuario');
        }

        public function detallef()
        {
            return $this->hasMany(detallefactura::class, 'idfactura');
        }

        // protected $table = 'ventas';
        // protected $primaryKey = 'idventas';
        // protected $fillable = ['Totalventa', 'fechaventa', 'id_usuario']; 
        // protected $guarded = [];
        // public $timestamps = false;
    

}
