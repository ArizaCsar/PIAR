<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    protected $table = 'sedes';
    protected $primaryKey = 'codigoSede';
    protected $fillable = ['codigoSede', 'descripcionSede'];
    public $timestamps = false;
}
