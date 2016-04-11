@extends('app')
@section('content')
    <div class="container">
        <div class="alert alert-success formIngresar" role="alert">
            {!! Form::open(['route' => 'auth/login', 'class' => 'form-group']) !!}
            <div class="form-group has-success">
                <label>Correo</label>
                {!! Form::email('email', '', ['class'=> 'form-control']) !!}
            </div>
            <div class="form-group has-success">
                <label>Contrseña</label>
                    {!! Form::password('password', ['class'=> 'form-control']) !!}
            </div>
            <div class="form-group has-success">
                <label><input name="remember" type="checkbox"> Recordar</label>
            </div>
            <div>                            
                {!! Form::submit('Entrar',['class' => 'btn btn-default']) !!}
            </div>
                {!! Form::close() !!}
            </div> 
        </div>
        <a href="/password/email">Forgot Your Password?</a>
    </div>
@endsection
