<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaSalida extends Model
{
    //
    protected $table='venta_salida';
    protected $primaryKey="idVentaSalida";

    public $timestamps=false;

    protected $fillable=[
        'fecVS','smart','kit','sim', 'plan', 'IdRegistro'
    ];
    protected $guarded =[

    ];
}
