<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupos_Etnicos extends Model
{
    protected $table = 'grupos_etnicos';
    protected $primaryKey = 'codigoGrupoEtnico';
    protected $fillable = ['codigoGrupoEtnico', 'descripcionGrupoEtnico'];
    public $timestamps = false;
}
