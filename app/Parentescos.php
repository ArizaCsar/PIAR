<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentescos extends Model
{
    protected $table = 'parentescos';
    protected $primaryKey = 'codigoParentesco';
    protected $fillable = ['codigoParentesco', 'descripcionParentesco'];
    public $timestamps = false;
}
