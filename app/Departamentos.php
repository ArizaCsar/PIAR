<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'codigoDepartamento';
    protected $fillable = ['codigoDepartamento', 'descripcionDepartamento','codigoPais'];
    public $timestamps = false;
    protected $keyType = 'string';

    public function pais(){
        return $this->belongsTo(Paises::class, 'codigoPais');
    }
}
