<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Redirect;
use App\Paciente;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        $pacientes = Paciente::all();
        return view('paciente',['pacientes' => $pacientes]);
    }

    public function postCrearPaciente(Request $request)
    {
        $pacIdentificacion = $request -> input('pacIdentificacion');
        $pacNombre = $request -> input ('pacNombre');
        $pacApellidos = $request -> input ('pacApellidos');
        $pacFechaNaciemiento = $request -> input('pacFechaNaciemiento');
        $sexo = $request -> input('sexo');

        // getting all of the post data
        $array = array('pacIdentificacion' => $pacIdentificacion,
            'pacNombre' => $pacNombre, 'pacApellidos' => $pacApellidos,
            'pacFechaNaciemiento' => $pacFechaNaciemiento, 'sexo' => $sexo,);
        // setting up rules
        $rules = array('pacIdentificacion' => 'required',
            'pacNombre' => 'required', 'pacApellidos' => 'required',
            'pacFechaNaciemiento' => 'required', 'sexo' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($array, $rules);

        if ($validator->fails()) 
        {
            // send back to the page with the input data and errors
            return Redirect::to('anadirPaciente')->withInput()->withErrors($validator);
        }
        else
        {
            $paciente = Paciente::create(['pacIdentificacion' => $pacIdentificacion,
                                    'pacNombre' => $pacNombre ,'pacApellidos' => $pacApellidos,
                                    'pacFechaNaciemiento' => $pacFechaNaciemiento , 'sexo' => $sexo ]);
            return Redirect::to('anadirPaciente')->with('message', 'Contenido Agregado');
        }
    }
   
}