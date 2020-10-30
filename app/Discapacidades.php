<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discapacidades extends Model
{
    protected $table = 'discapacidades';
    protected $primaryKey = 'codigoDiscapacidad';
    protected $fillable = ['codigoDiscapacidad', 'descripcionDiscapacidad','codigoTipoDiscapacidad'];
    public $timestamps = false;
    protected $keyType = 'number';

    public function pais(){
        return $this->belongsTo(Discapacidades::class, 'codigoTipoDiscapacidad');
    }
}
