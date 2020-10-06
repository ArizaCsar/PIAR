<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table = 'paises';
    protected $primaryKey = 'codigoPais';
    protected $fillable = ['codigoPais', 'descripcionPais'];
    public $timestamps = false;
}
