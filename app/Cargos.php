<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table = 'cargos';
    protected $primaryKey = 'codigoCargo';
    protected $fillable = ['codigoCargo', 'descripcionCargo'];
    public $timestamps = false;
}
