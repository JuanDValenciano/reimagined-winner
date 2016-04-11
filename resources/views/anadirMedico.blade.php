@include ('navbar')
            <div id="contenido">
                <h2>Crear Medico</h2>    
                <div id="frmMedico" title="Agregar nuevo Medico">
                    {!! Form::open(['url'=>'Medico/agregarMedico', 'method'=>'POST','files'=>true]) !!}
                    <table>
                        <tr>
                            <td>Documento</td>
                            <td>
                                {!!Form::text('medIdentificacion', '',['placeholder' => '', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'minlength' => '4', 'pattern'=>'^[_A-z 0-9]{1,}$'])!!}
                            <td>
                        </tr>
                        <tr>
                            <td>Nombres</td>
                            <td>
                                {!!Form::text('medNombre', '',['placeholder' => '', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'minlength' => '4', 'pattern'=>'^[_A-z 0-9]{1,}$'])!!}
                            </td>
                        </tr>
                        <tr>
                            <td>Apellidos</td>
                            <td>
                                {!!Form::text('medApellidos', '',['placeholder' => '', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'minlength' => '4', 'pattern'=>'^[_A-z 0-9]{1,}$'])!!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>{!!Form::submit('Subir')!!}</label>
                            </td>
                        </tr>
                    </table>
                    {!! Form::close() !!}
                    <br><br><br>
                </div>
            </div>   
        </body> 
</html>
