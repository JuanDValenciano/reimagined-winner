@include ('navbar')
            <div id="contenido">
                <h2>Crear Tratamiento</h2>                
                <div id="frmPaciente" title="Agregar nuevo tratamiento">
                {!! Form::open(['url'=>'Tratamiento/agregarTratamiento', 'method'=>'POST','files'=>true]) !!}
                <table>
                    <tr>
                        <td>Fecha Asignado</td>
                        <td>
                          <input type="date" name="traFechaAsignado"> 
                        <td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td>
                            {!!Form::textarea('traDescripcion', '',['placeholder' => '', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'minlength' => '4', 'pattern'=>'^[_A-z 0-9]{1,}$'])!!}
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha de inicio</td>
                        <td>
                          <input type="date" name="traFechaInicio">
                        <td>
                    </tr>
                    <tr>
                        <td>Fecha de fin</td>
                        <td>
                            <input type="date" name="traFechaFin">
                        </td>
                    </tr>
                    <tr>
                        <td>Observaciones</td>
                        <td>    
                            {!!Form::textarea('traObservaciones', '',['placeholder' => '', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'minlength' => '4', 'pattern'=>'^[_A-z 0-9]{1,}$'])!!}
                        </td>
                    </tr>
                    <tr>
                        <td>Paciente</td>
                        <td>
                            <select name="pacIdentificacion[]">
                                @foreach ($pacientes as $paciente)
                                    <?php 
                                        echo "<option value='{$paciente->pacIdentificacion}'>{$paciente->pacNombre}</option>";
                                    ?>
                                @endforeach
                            </select>
                        </td>
                    <tr>
                        <td>
                            <label>{!!Form::submit('Subir')!!}</label>
                        </td>
                    </tr>
                </table>
                {!! Form::close() !!}
            </div>
        </div>
    </body>
</html>
