<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    protected $table = 'ciudades';
    protected $primaryKey = 'codigoCiudad';
    protected $fillable = ['codigoCiudad', 'descripcionCiudad','codigoDepartamento'];
    public $timestamps = false;
    protected $keyType = 'string';

    public function departamento(){
        return $this->belongsTo(Departamentos::class, 'codigoDepartamento');
    }
}
