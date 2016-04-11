<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Redirect;
use App\Paciente;
use App\Medico;
use App\Consultorio;
use App\Cita;

class CitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        $citas = Cita::all();
        return view('cita',['citas' => $citas]);
    }

    public function postCrearCita(Request $request)
    {   
        $citFecha = $request->input('citFecha');
        $citHora = $request->input('citHora');
        $pacIdentificacion = $request->input('pacIdentificacion');
        $medIdentificacion = $request->input('medIdentificacion');
        $conNumero = $request->input('conNumero');
        $citEstado = $request->input('citEstado');
        $citObservaciones = $request->input('citObservaciones');

        // getting all of the post data
        $array = array('citFecha' => $citFecha,
            'citHora' => $citHora,
            'pacIdentificacion' => $pacIdentificacion,
            'medIdentificacion' => $medIdentificacion,
            'conNumero' => $conNumero,            
            'citEstado' => $citEstado,
            'citObservaciones'=>$citObservaciones,);
        // setting up rules
        $rules = array('citFecha' => 'required',
            'citHora' => 'required',
            'pacIdentificacion' => 'required',
            'medIdentificacion' => 'required',
            'conNumero' => 'required',
            'citEstado' => 'required',
            'citObservaciones' =>'required',);
        $validator = Validator::make($array, $rules);

        if ($validator->fails()) 
        {
            // send back to the page with the input data and errors
            return Redirect::to('home')->withInput()->withErrors($validator);
        }
        else
        {
            $cita = Cita::create(['citFecha'=> $citFecha,
                                    'citHora' => $citHora,
                                    'citEstado' => $citEstado,
                                    'citObservaciones' => $citObservaciones]);
            $cita->save();
            foreach ($pacIdentificacion as $paciente) 
            {
                $cita->pacientes()->attach($paciente);
            }
            foreach ($medIdentificacion as $medico) 
            {
                $cita->medicos()->attach($medico);
            }
            foreach ($conNumero as $consultorio) 
            {
                $cita->consultorios()->attach($consultorio);
            }
            $cita->save();
            return Redirect::to('anadirCita')->with('message', 'Contenido Agregado');
        }
    }

    public function modificarCita(Request $request)
    {
        $cita = Cita::find($request->input('opcCita'));
        $array = array('cita' => $cita,);
        $rules = array('cita' => 'required',);
        $validator = Validator::make($array, $rules);
        if ($validator->fails()) 
        {
            return Redirect::to('home')->withInput()->withErrors(array('message' => 'Es necesario que escoja algua prenda'));
        }
        else
        {
            $registrosPacientes = Paciente::all();
            
            $registrosMedicos = Medico::all();
            
            $registrosConsultorios = Consultorio::all();
            
            return view('editarCitaF',['cita' => $cita,'pacientes' => $registrosPacientes,'medicos' => $registrosMedicos,'consultorios' => $registrosConsultorios]);
        }
    }

    public function postModificarCita(Request $request)
    {
        $citaActual = Cita::find($request->input('id'));
        $citFecha = $request->input('citFecha');
        $citHora = $request->input('citHora');
        $pacIdentificacion = $request->input('pacIdentificacion');
        $medIdentificacion = $request->input('medIdentificacion');
        $conNumero = $request->input('conNumero');
        $citEstado = $request->input('citEstado');
        $citObservaciones = $request->input('citObservaciones');

        // getting all of the post data
        $array = array('citFecha' => $citFecha,
            'citHora' => $citHora,
            'pacIdentificacion' => $pacIdentificacion,
            'medIdentificacion' => $medIdentificacion,
            'conNumero' => $conNumero,            
            'citEstado' => $citEstado,
            'citObservaciones'=>$citObservaciones,);
        // setting up rules
        $rules = array('citFecha' => 'required',
            'citHora' => 'required',
            'pacIdentificacion' => 'required',
            'medIdentificacion' => 'required',
            'conNumero' => 'required',
            'citEstado' => 'required',
            'citObservaciones' =>'required',);
        $validator = Validator::make($array, $rules);

        if ($validator->fails()) 
        {
            // send back to the page with the input data and errors
            return Redirect::to('home')->withInput()->withErrors($validator);
        }
        else
        {
            $citaActual->citFecha=$citFecha;
            $citaActual->citHora=$citHora;
            $citaActual->citEstado=$citEstado;
            $citaActual->citObservaciones=$citObservaciones;
            $citaActual->save();

            $citaActual->pacientes()->detach();
            $citaActual->medicos()->detach();
            $citaActual->consultorios()->detach();

            foreach ($pacIdentificacion as $paciente) 
            {
                $citaActual->pacientes()->attach($paciente);
            }
            foreach ($medIdentificacion as $medico) 
            {
                $citaActual->medicos()->attach($medico);
            }
            foreach ($conNumero as $consultorio) 
            {
                $citaActual->consultorios()->attach($consultorio);
            }
            $citaActual->save();

            return Redirect::to('editarCita')->with('message', 'Cita Modificada');
        }
    }

     public function postEliminarCita(Request $request)
    {

        $idCita = $request->input('opcCita');
        $cita = Cita::find($idCita);
       //return $talla ->prendas;
        foreach ($cita->pacientes as $paciente) 
        {
           $cita->pacientes()->detach($paciente->id);
        }
        foreach ($cita->medicos as $medico) 
        {
           $cita->medicos()->detach($medico->id);
        }
        foreach ($cita->consultorios as $consultorio) 
        {
           $cita->consultorios()->detach($consultorio->id);
        }

        $cita->delete();
        return Redirect::to('eliminarCita')->with('message', 'Eliminado Correctamente');
    }

}
