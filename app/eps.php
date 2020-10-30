<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eps extends Model
{
    protected $table = 'eps';
    protected $primaryKey = 'codigoEps';
    protected $fillable = ['codigoEps', 'descripcionEps'];
    public $timestamps = false;
}
