@include('navbar')
            <div id="contenido">
                <h2>Añadir Cita</h2>                
                <div id="frmCita" title="Agregar nueva cita">
                    {!! Form::open(['url'=>'Cita/agregarCita', 'method'=>'POST','files'=>true]) !!}
                    <table>
                        <tr>
                            <td>Fecha Cita</td>
                            <td>
                                <input type="date" name="citFecha"> 
                            </td>
                        </tr>
                        <tr>
                            <td>Hora Cita</td>
                            <td>
                              <input type="time" name="citHora"> 
                            </td>
                        </tr>
                        <tr>
                            <td>Paciente</td>
                            <td>
                                <select name="pacIdentificacion[]">
                                    @foreach ($pacientes as $paciente)
                                        <?php 
                                            echo "<option value='{$paciente->id}'>{$paciente->pacNombre}</option>";
                                        ?>
                                    @endforeach
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td>Medico</td>
                            <td>
                                <select name="medIdentificacion[]">
                                    @foreach ($medicos as $medico)
                                        <?php 
                                            echo "<option value='{$medico->id}'>{$medico->medNombre}</option>";
                                        ?>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Consultorio</td>
                            <td>
                                <select name="conNumero[]">
                                    @foreach ($consultorios as $consultorio)
                                        <?php 
                                            echo "<option value='{$consultorio->id}'>{$consultorio->conNombre}</option>";
                                        ?>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>
                                {!!Form::textarea('citEstado', '',['placeholder' => '', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'minlength' => '4', 'pattern'=>'^[_A-z 0-9]{1,}$'])!!}
                            </td>
                        </tr>
                        <tr>
                            <td>Observaciones</td>
                            <td>    
                                {!!Form::textarea('citObservaciones', '',['placeholder' => '', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'minlength' => '4', 'pattern'=>'^[_A-z 0-9]{1,}$'])!!}
                            </td>
                        </tr>
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
