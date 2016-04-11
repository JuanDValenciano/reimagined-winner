<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
   	protected $table = 'consultorios';

    protected $fillable = ['conNumero','conNombre'];
    
    public function citas()
    {
        return $this->belongsToMany('App\Cita','citCon');
        //return $this->belongsToMany('App\Tratamiento');
    }
}
