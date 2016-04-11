<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
   	protected $table = 'tratamientos';

    protected $fillable = ['traFechaAsignado','traDescripcion','traFechaInicio','traFechaFin','traObservaciones'];

        public function pacientes()
    {
        return $this->belongsToMany('App\Paciente','traPac','tratamiento_id','paciente_id');
    }
}
