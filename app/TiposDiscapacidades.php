<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposDiscapacidades extends Model
{
    protected $table = 'tipos_discapacidades';
    protected $primaryKey = 'codigoTipoDiscapacidad';
    protected $fillable = ['codigoTipoDiscapacidad', 'descripcionTipoDiscapacidad'];
    public $timestamps = false;
}
