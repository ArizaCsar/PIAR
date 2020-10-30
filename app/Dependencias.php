<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    protected $table = 'dependencias';
    protected $primaryKey = 'codigoDependencia';
    protected $fillable = ['codigoDependencia', 'descripcionDependencia'];
    public $timestamps = false;
}
