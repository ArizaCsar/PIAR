<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frecuencias extends Model
{
    protected $table = 'frecuencias';
    protected $primaryKey = 'codigoFrecuencia';
    protected $fillable = ['codigoFrecuencia', 'descripcionFrecuencia'];
    public $timestamps = false;
}
