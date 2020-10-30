<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    protected $table = 'materias';
    protected $primaryKey = 'codigoMateria';
    protected $fillable = ['codigoMateria', 'descripcionMateria'];
    public $timestamps = false;
}
