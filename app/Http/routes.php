<?php
use App\Paciente;
use App\Medico;
use App\Consultorio;
use App\Cita;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Errores...
Route::get('403', function () 
{
    return view('errors/403');
});

Route::get('pdf', 'PdfController@invoice');

Route::get('404', function () 
{
    return view('errors/404');
});

Route::get('503', function ()
{
    return view('errors/503');
});

Route::get('lol', function ()
{
    $registrosPacientes = Paciente::all();
        $registrosMedicos = Medico::all();
        $registrosConsultorios = Consultorio::all();
        $registrosCitas = Cita::all();
        return view('pdf.invoice',['pacientes' => $registrosPacientes, 'medicos' => $registrosMedicos , 'consultorios' => $registrosConsultorios , 'citas' => $registrosCitas ]);
});


// Rutas de autentificacion...
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Rutas de registro...
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

//Rutas de los controladores...
Route::post('Paciente/agregarPaciente', ['as' => 'Paciente/agregarPaciente', 'uses' => 'PacienteController@postCrearPaciente']);
Route::post('Tratamiento/agregarTratamiento', ['as' => 'Tratamiento/agregarTramiento', 'uses' => 'TratamientController@postCrearTratamiento']);
Route::post('Medico/agregarMedico', ['as' => 'Medico/agregarMedico', 'uses' => 'MedicoController@postCrearMedico']);
Route::post('Cita/agregarCita', ['as' => 'Cita/agregarCita', 'uses' => 'CitController@postCrearCita']);
Route::post('modificarCita', ['as' => 'modificarCita', 'uses' => 'CitController@modificarCita']);
Route::post('Cita/editarCita', ['as' => 'Cita/editarCita', 'uses' => 'CitController@postModificarCita']);
Route::post('Cita/eliminarCita', ['as' => 'Cita/eliminarCita', 'uses' => 'CitController@postEliminarCita']);
Route::controllers(['password' => 'Auth\PasswordController',]);

//Vistas que requieren Auth...
Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/', ['middleware' => 'guest',function () 
    {
        return Redirect::to('auth/login');
    }]);

    Route::get('home', function() 
    {
        return view('home');
    });

    // Vistas de creacion...
    Route::get('anadirPaciente', function () 
    {
        return view('anadirPaciente');
    });

    Route::get('anadirMedico', function ()
    {
        return view('anadirMedico');
    });

    Route::get('anadirTratamiento', function ()
    {
        $registrosPacientes = Paciente::all();
        return view('anadirTratamiento',['pacientes' => $registrosPacientes]);
    });

    Route::get('anadirCita', function () 
    {
        $registrosPacientes = Paciente::all();
        $registrosMedicos = Medico::all();
        $registrosConsultorios = Consultorio::all();
        return view('anadirCita',['pacientes' => $registrosPacientes, 'medicos' => $registrosMedicos , 'consultorios' => $registrosConsultorios  ]);
    }); 

    //Vista de consulta..
    Route::get('consultarCita', function () 
    {
        $registrosPacientes = Paciente::all();
        $registrosMedicos = Medico::all();
        $registrosConsultorios = Consultorio::all();
        $registrosCitas = Cita::all();
        return view('consultarCita',['pacientes' => $registrosPacientes, 'medicos' => $registrosMedicos , 'consultorios' => $registrosConsultorios , 'citas' => $registrosCitas ]);
    });

    //Vista de modificacion...
    Route::get('editarCita', function () {
        $citas = Cita::all();
        return view('editarCita',['citas'=>$citas]);
    });

    //Vista de borrado...
    Route::get('eliminarCita', function () {
        $citas =  Cita::all();
        return view('eliminarCita',['citas' => $citas]);
    });
});

//Vistas que no requieren Auth...
Route::get('auth/login',['middleware' => 'guest', function ()
{
    return view('login');
}]);

Route::get('auth/register', ['middleware' => 'guest', function ()
{
    return view('register');
}]);
