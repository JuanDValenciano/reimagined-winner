@extends('app')
@section('content')
    <div class="container">
        <div class="alert alert-success formIngresar" role="alert">
            {!! Form::open(['url' => 'password/email', 'class' => 'form-group']) !!}
            <div class="form-group has-success">
                <label>Correo</label>
                {!! Form::email('email', '', ['class'=> 'form-control']) !!}
            </div>
            <div>                            
                {!! Form::submit('Enviar',['class' => 'btn btn-default']) !!}
            </div>
                {!! Form::close() !!}
            </div> 
        </div>
    </div>
@endsection