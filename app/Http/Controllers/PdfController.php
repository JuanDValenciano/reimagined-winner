<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Medico;
use App\Consultorio;
use App\Cita;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function invoice() 
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape');
        return $pdf->stream('invoice');
    }
 
    public function getData() 
    {
        $citas = Cita::all();
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        $consultorios = Consultorio::all();
        $data =  [
            'citas'      => $citas ,

            /*'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'*/
        ];
        return $data;
    }    
}
