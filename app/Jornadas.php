<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornadas extends Model
{
    protected $table = 'jornadas';
    protected $primaryKey = 'codigoJornada';
    protected $fillable = ['codigoJornada', 'descripcionJornada'];
    public $timestamps = false;
}
