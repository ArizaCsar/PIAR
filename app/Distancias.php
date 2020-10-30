<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distancias extends Model
{
    protected $table = 'distancias';
    protected $primaryKey = 'codigoDistancias';
    protected $fillable = ['codigoDistancias', 'descripcionDistancias'];
    public $timestamps = false;
}
