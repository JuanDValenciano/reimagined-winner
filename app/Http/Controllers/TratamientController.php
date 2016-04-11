<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Redirect;
use App\Tratamiento;
use App\Paciente;

class TratamientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        $tratamientos = Tratamiento::all();
        return view('tratamiento',['tratamientos' => $tratamientos]);
    }

    public function postCrearTratamiento(Request $request)
    {   

        $traFechaAsignado = $request->input('traFechaAsignado');
        $traDescripcion = $request->input('traDescripcion');
        $traFechaInicio = $request->input('traFechaInicio');
        $traFechaFin = $request->input('traFechaFin');
        $traObservaciones = $request->input('traObservaciones');
        $pacIdentificacion = $request->input('pacIdentificacion');

        // getting all of the post data
        $array = array('traFechaAsignado' => $traFechaAsignado,
            'traDescripcion' => $traDescripcion,
            'traFechaInicio' => $traFechaInicio,
            'traFechaFin' =>$traFechaFin,
            'traObservaciones' => $traObservaciones,
            'pacIdentificacion'=>$pacIdentificacion,);
        // setting up rules
        $rules = array('traFechaAsignado' => 'required',
            'traDescripcion' => 'required',
            'traFechaInicio' => 'required',
            'traFechaFin' =>'required',
            'traObservaciones' => 'required',
            'pacIdentificacion'=>'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($array, $rules);

        if ($validator->fails()) 
        {
            // send back to the page with the input data and errors
            return Redirect::to('home')->withInput()->withErrors($validator);
        }
        else
        {
            $tratamiento = Tratamiento::create(['traFechaAsignado'=> $traFechaAsignado,
                                    'traDescripcion' => $traDescripcion,
                                    'traFechaInicio' => $traFechaInicio,
                                    'traFechaFin' => $traFechaFin,
                                    'traObservaciones' => $traObservaciones ]);
            $tratamiento->save();
            foreach ($pacIdentificacion as $paciente) 
            {
                $tratamiento->pacientes()->attach($paciente);
            }
            return Redirect::to('anadirTratamiento')->with('message', 'Contenido Agregado');
        }
    }

    public function postEliminarTela(Request $request)
    {
        $idTela = $request->input('opcTela');
        $tela = Tela::find($idTela);
       //return $talla ->prendas;
        foreach ($tela->prendas as $prenda) 
        {
           $tela->prendas()->detach($prenda->id);
        }
        $tela->delete();
        return Redirect::to('eliminarTela')->with('message', 'Eliminado Correctamente');
    }

    public function modificarTela(Request $request)
    {
        $tela = Tela::find($request->input('opcTela'));
        $array = array('tela' => $tela,);
        $rules = array('tela' => 'required',);
        $validator = Validator::make($array, $rules);
        if ($validator->fails()) 
        {
            return Redirect::to('editarTela')->withInput()->withErrors(array('message' => 'Es necesario que escoja alguna tela'));;
        }
        else
        {
            return view('editarTelaF',['tela'=>$tela]);
        }
    }

    public function postModificarTela(Request $request)
    {
        $telaActual = Tela::find($request->input('id'));
        $codtela = $request->input('ntela');
        $nombretela = $request->input('tTela');

        // getting all of the post data
        $array = array('codtela' => $codtela,
                        'nombretela' => $nombretela,);
        // setting up rules
        $rules = array('codtela' => 'required|string',
                        'nombretela' => 'required|string',);

        $validator = Validator::make($array, $rules);

        if ($validator->fails()) 
        {
            // send back to the page with the input data and errors
            return Redirect::to('editarTela')->withInput()->withErrors($validator);
        }
        else
        {
            $telaActual->nTela = $codtela;
            $telaActual->tTela = $nombretela;
            $telaActual->save();
            return Redirect::to('editarTela')->with('message', 'tela Modificado');
        }
    }
   
}