<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html:charset=UTF-8"/>
        <title>Sistema de Gestión Odontológica</title>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        {!! Html::style('css/bootstrap.css') !!}
        {!! Html::style('css/bootstrap.min.css') !!}
        {!! Html::style('css/jquery.dataTables.css') !!}
        {!! Html::style('css/estilos.css') !!}
        {!! Html::style('css/jquery.dataTables.css') !!}
        {!! Html::style('css/bootstrap-theme.min.css') !!}
        {!! Html::style('DataTables/datatables.min.css') !!}
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#DataTable').DataTable({
                    "language": {
                        "url": "../DataTables/Plugins/spanish.json"
                    }
                });
            });
        </script>
    </head>
    <body>
        @if (session('message'))
            <script type="text/javascript">
                alert("{{ session('message') }}"); 
            </script> 
        @endif
        @if (count($errors) > 0)
            <div class="peligroP">
                <label>Estan presentando los siguientes errores: </label>
                <ul>
                    @foreach ($errors->all() as $error)        
                        <div class="col-md-4">
                            <li>
                                {{ $error }}
                            </li>
                        </div> 
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="contenedor">
            <div id="encabezado">    
            </div>
            <ul class="list-group lol">
                <li class="list-group-item list-group-item-info lol"><a href="home">Inicio</a></li>
                <li class="list-group-item list-group-item-info lol"><a href="anadirPaciente">Crear Paciente</a></li>
                <li class="list-group-item list-group-item-info lol"><a href="anadirMedico">Crear Medico</a></li>
                <li class="list-group-item list-group-item-info lol"><a href="anadirTratamiento">Crear Tratamiento</a></li>
                <li class="list-group-item list-group-item-info lol"><a href="anadirCita">Asignar Cita</a></li>
                <li class="list-group-item list-group-item-info lol"><a href="consultarCita">Consultar Cita</a></li>
                <li class="list-group-item list-group-item-info lol"><a href="editarCita">Editar Cita</a></li>
                <li class="list-group-item list-group-item-info lol" ><a href="eliminarCita">Cancelar Cita</a></li>
                <li class="list-group-item list-group-item-info lol"><a href="{{route('auth/logout')}}">Desconectar</a></li>
            </ul>