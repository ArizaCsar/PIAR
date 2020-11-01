<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadesEducativas extends Model
{
    protected $table = 'entidades_educativas';
    protected $primaryKey = 'codigoEntidadEducativa';
    protected $fillable = ['codigoEntidadEducativa', 'nombreEntidadEducativa','principal', 'codigoSede', 'codigoJornada'];
    public $timestamps = false;
    protected $keyType = 'number';

    public function sede(){
        return $this->belongsTo(Sedes::class, 'codigoSede');
    }
    public function jornada(){
        return $this->belongsTo(Jornadas::class, 'codigoJornada');
    }
}
