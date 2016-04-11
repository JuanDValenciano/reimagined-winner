@include('navbar')
  <div id="contenido">
    <div class="table-responsive responsivo">
      {!! Form::open(['url'=>'Cita/eliminarCita', 'method'=>'POST']) !!}
      <table class="table table-bordered table-hover tabla display" id="DataTable" cellspacing="0">
         
        <thead>
          <tr>
            <th>Seleccionar</th>
            <th>Fecha de cita</th> 
            <th>Hora de cita</th> 
            <th>Nombre paciente</th>
            <th>Id paciente</th>
            <th>Nombre medico</th>
            <th>Id medico</th>
            <th>Consultorio</th>
            <th>Estado de cita</th>
            <th>Observaciones</th>
          </tr> 
        </thead>
        <tbody>
          @foreach ($citas as $cita)
            <tr>
              <th>{!! Form::radio('opcCita', $cita->id) !!}</th>  
              <td>{{$cita->citFecha}}</td>
              <td>{{$cita->citHora}}</td> 
                {!!
                  $pacientes = '';
                  for ($i = 0; $i <= count($cita->pacientes)-1; $i++)
                    {
                      $paciente = $cita->pacientes[$i];
                      if (count($cita->pacientes)-1==0)
                      {
                        $pacientes .= $paciente->pacNombre;
                      }
                      elseif ($i == count($cita->pacientes)-1)
                      {
                        $pacientes .= $paciente->pacNombre;
                      }
                      else
                      {
                        $pacientes .= $paciente->pacNombre.',';
                      }
                    }
                !!}
              <td>{{$pacientes}}</td>
                {!!
                  $pacientes = '';
                  for ($i = 0; $i <= count($cita->pacientes)-1; $i++)
                    {
                      $paciente = $cita->pacientes[$i];
                      if (count($cita->pacientes)-1==0)
                      {
                        $pacientes .= $paciente->pacIdentificacion;
                      }
                      elseif ($i == count($cita->pacientes)-1)
                      {
                        $pacientes .= $paciente->pacIdentificacion;
                      }
                      else
                      {
                        $pacientes .= $paciente->pacIdentificacion.',';
                      }
                    }
                !!}
              <td>{{$pacientes}}</td> 
                {!!
                  $medicos = '';
                  for ($i = 0; $i <= count($cita->medicos)-1; $i++)
                    {
                      $medico = $cita->medicos[$i];
                      if (count($cita->medicos)-1==0)
                      {
                        $medicos .= $medico->medNombre;
                      }
                      elseif ($i == count($cita->medicos)-1)
                      {
                        $medicos .= $medico->medNombre;
                      }
                      else
                      {
                        $medicos .= $medico->medNombre.',';
                      }
                    }
                !!}
              <td>{{$medicos}}</td> 
                {!!
                  $medicos = '';
                  for ($i = 0; $i <= count($cita->medicos)-1; $i++)
                    {
                      $medico = $cita->medicos[$i];
                      if (count($cita->medicos)-1==0)
                      {
                        $medicos .= $medico->medIdentificacion;
                      }
                      elseif ($i == count($cita->medicos)-1)
                      {
                        $medicos .= $medico->medIdentificacion;
                      }
                      else
                      {
                        $medicos .= $medico->medIdentificacion.',';
                      }
                    }
                !!}
              <td>{{$medicos}}</td> 
                {!!
                  $consultorios = '';
                  for ($i = 0; $i <= count($cita->consultorios)-1; $i++)
                    {
                      $consultorio = $cita->consultorios[$i];
                      if (count($cita->consultorios)-1==0)
                      {
                        $consultorios .= $consultorio->conNombre;
                      }
                      elseif ($i == count($cita->consultorios)-1)
                      {
                        $consultorios .= $consultorio->conNombre;
                      }
                      else
                      {
                        $consultorios .= $consultorio->conNombre.',';
                      }
                    }
                !!} 
              <td>{{$consultorios}}</td> 
              
              <td>{{$cita->citEstado}}</td>
              <td>{{$cita->citObservaciones}}</td>   
              </tr> 
            @endforeach
          </tbody>
        </table>
        {!!Form::submit('Cancelar cita')!!}
        {!! Form::close() !!}
      </div>
    </body>
</html>