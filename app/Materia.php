<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{

    protected $primaryKey = 'idmateria';

    protected $fillable = ['nombre', 'descripcion', 'codigo'];
}
