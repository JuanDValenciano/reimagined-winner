<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
   	protected $table = 'citas';

    protected $fillable = ['citFecha','citHora','citEstado','citObservaciones'];
    
    public function pacientes()
    {
        return $this->belongsToMany('App\Paciente','pacCit','cita_id','paciente_id');
    }
	public function medicos()
    {
        return $this->belongsToMany('App\Medico','citMed','cita_id','medico_id');
    }
    public function consultorios()
    {
        return $this->belongsToMany('App\Consultorio','citCon','cita_id','consultorio_id');
    }
}



