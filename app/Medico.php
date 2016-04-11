<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
   	protected $table = 'medicos';

    protected $fillable = ['medIdentificacion','medNombre','medApellidos'];
    
    public function citas()
    {
        return $this->belongsToMany('App\Cita','citMed');
        //return $this->belongsToMany('App\Tratamiento');
    }
}
