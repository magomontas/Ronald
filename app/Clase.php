<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
//    protected $table='clases';

    protected $primaryKey="idclase";

    protected $fillable =[
        'idclase',
        'nombre',
        'tareas',
    ];
}
