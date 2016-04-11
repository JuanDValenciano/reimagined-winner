@include('navbar')
            <div id="contenido">
                <h2>Crear Paciente</h2>
                {!! Form::open(['url'=>'Paciente/agregarPaciente', 'method'=>'POST','files'=>true]) !!}
                <table>
                    <tr>
                        <td>Documento</td>
                        <td>
                         {!!Form::text('pacIdentificacion', '',['placeholder' => '', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'minlength' => '4', 'pattern'=>'^[_A-z 0-9]{1,}$'])!!}
                        <td>
                    </tr>
                    <tr>
                        <td>Nombres</td>
                        <td>
                            {!!Form::text('pacNombre', '',['placeholder' => '', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'minlength' => '4', 'pattern'=>'^[_A-z 0-9]{1,}$'])!!}
                        </td>
                    </tr>
                    <tr>
                        <td>Apellidos</td>
                        <td>
                            {!!Form::text('pacApellidos', '',['placeholder' => '', 'class' => 'form-control', 'required', 'maxlength'=>'255', 'minlength' => '4', 'pattern'=>'^[_A-z 0-9]{1,}$'])!!}
                        <td>
                    </tr>
                    <tr>
                        <td>Fecha de Nacimiento</td>
                        <td>
                            <input type="date" name="pacFechaNaciemiento">
                        </td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td>    
                            Masculino {!!Form::radio('sexo', 'm')!!}
                            Femenino {!!Form::radio('sexo', 'f')!!}
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
