<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
   	protected $table = 'pacientes';

    protected $fillable = ['pacIdentificacion','pacNombre','pacApellidos','pacFechaNaciemiento','sexo'];
    
    public function tratamientos()
    {
        return $this->belongsToMany('App\Tratamiento');
        //return $this->belongsToMany('App\Tratamiento');
    }

    public function citas()
    {
        return $this->belongsToMany('App\Cita','pacCit');
        //return $this->belongsToMany('App\Tratamiento');
    }
}
