@include('navbar')


        <div id="contenido">
          <div class="table-responsive responsivo">
            <table class="table table-bordered table-hover tabla display" id="DataTable" cellspacing="0">
              <thead>
                <tr>
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
                    <td>{{$cita->citFecha}}</td>
                    <td>{{$cita->citHora}}</td> 
                    {!!
                      $pacientirijillos = '';
                      for ($i = 0; $i <= count($cita->pacientes)-1; $i++)
                      {
                        $paciente = $cita->pacientes[$i];
                        if (count($cita->pacientes)-1==0)
                        {
                          $pacientirijillos .= $paciente->pacNombre;
                        }
                        elseif ($i == count($cita->pacientes)-1)
                        {
                          $pacientirijillos .= $paciente->pacNombre;
                        }
                        else
                        {
                          $pacientirijillos .= $paciente->pacNombre.',';
                        }
                      }
                    !!}
                    <td>{{$pacientirijillos}}</td>
                    {!!
                      $pacientirijillos = '';
                      for ($i = 0; $i <= count($cita->pacientes)-1; $i++)
                      {
                        $paciente = $cita->pacientes[$i];
                        if (count($cita->pacientes)-1==0)
                        {
                          $pacientirijillos .= $paciente->pacIdentificacion;
                        }
                        elseif ($i == count($cita->pacientes)-1)
                        {
                          $pacientirijillos .= $paciente->pacIdentificacion;
                        }
                        else
                        {
                          $pacientirijillos .= $paciente->pacIdentificacion.',';
                        }
                      }
                    !!}
                    <td>{{$pacientirijillos}}</td> 
                    {!!
                      $doctorcirijillos = '';
                      for ($i = 0; $i <= count($cita->medicos)-1; $i++)
                      {
                        $medico = $cita->medicos[$i];
                        if (count($cita->medicos)-1==0)
                        {
                          $doctorcirijillos .= $medico->medNombre;
                        }
                        elseif ($i == count($cita->medicos)-1)
                        {
                          $doctorcirijillos .= $medico->medNombre;
                        }
                        else
                        {
                        $doctorcirijillos .= $medico->medNombre.',';
                        }
                      }
                    !!}
                    <td>{{$doctorcirijillos}}</td> 
                    {!!
                      $doctorcirijillos = '';
                      for ($i = 0; $i <= count($cita->medicos)-1; $i++)
                      {
                        $medico = $cita->medicos[$i];
                        if (count($cita->medicos)-1==0)
                        {
                          $doctorcirijillos .= $medico->medIdentificacion;
                        }
                        elseif ($i == count($cita->medicos)-1)
                        {
                          $doctorcirijillos .= $medico->medIdentificacion;
                        }
                        else
                        {
                          $doctorcirijillos .= $medico->medIdentificacion.',';
                        }
                      }
                    !!}
                    <td>{{$doctorcirijillos}}</td> 
                    {!!
                      $consultorijillos = '';
                      for ($i = 0; $i <= count($cita->consultorios)-1; $i++)
                      {
                        $consultorio = $cita->consultorios[$i];
                        if (count($cita->consultorios)-1==0)
                        {
                          $consultorijillos .= $consultorio->conNombre;
                        }
                        elseif ($i == count($cita->consultorios)-1)
                        {
                          $consultorijillos .= $consultorio->conNombre;
                        }
                        else
                        {
                          $consultorijillos .= $consultorio->conNombre.',';
                        }
                      }
                    !!} 
                    <td>{{$consultorijillos}}</td>               
                    <td>{{$cita->citEstado}}</td>
                    <td>{{$cita->citObservaciones}}</td>   
                  </tr> 
                @endforeach
              </tbody>
            </table>
            <a href="pdf" class="button">Generar PDF</a>
          </div>
        </div>
    </body>
</html>