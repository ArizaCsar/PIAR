<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupaciones extends Model
{
    protected $table = 'ocupaciones';
    protected $primaryKey = 'codigoOcupacion';
    protected $fillable = ['codigoOcupacion', 'descripcionOcupacion'];
    public $timestamps = false;
}
