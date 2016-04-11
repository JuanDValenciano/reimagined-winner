@extends('app')
@section('content')
    <div class="container">
        <div class="alert alert-success formIngresar" role="alert">
            {!! Form::open(['url' => '/password/reset', 'class' => 'form-group']) !!}
              <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group has-success">
                <label>Correo</label>
                {!! Form::email('email', '', ['class'=> 'form-control']) !!}
            </div>
            <div class="form-group has-success">
                <label>Contraseña</label>
                {!! Form::password('password', ['class'=> 'form-control']) !!}
            </div>
            <div class="form-group has-success">
                <label>Confirmar Contraseña</label>
                {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
            </div>
            <div>                            
                {!! Form::submit('Enviar',['class' => 'btn btn-default']) !!}
            </div>
                {!! Form::close() !!}
            </div> 
        </div>
    </div>
@endsection