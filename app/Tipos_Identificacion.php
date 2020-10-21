<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_Identificacion extends Model
{
    protected $table = 'tipos_identificacion';
    protected $primaryKey = 'codigoTipoId';
    protected $fillable = ['codigoTipoId', 'descripcionTipoId'];
    public $timestamps = false;
}
