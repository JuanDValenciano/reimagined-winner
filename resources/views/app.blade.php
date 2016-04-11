<!DOCTYPE html>
<html lang="en">
    <head>
        {!! Html::style('css/bootstrap.css') !!}
        {!! Html::style('css/bootstrap.min.css') !!}
        {!! Html::style('css/jquery.dataTables.css') !!}
        {!! Html::style('css/bootstrap-theme.min.css') !!}
        {!! Html::style('css/styles.css') !!}
        {!! Html::style('css/menuStyles.css') !!}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <div class="container">
            @if (Session::has('errors'))
		        <div class="alert alert-warning" role="alert">
                    <ul>
                        <strong>Oops! Something went wrong : </strong>
                        @foreach ($errors->all() as $error)
				            <li>
                                {{ $error }}
                            </li>
		                @endforeach
		            </ul>
		        </div>
		    @endif
        </div>
        @yield('content')
        {!! Html::script('js/bootstrap.min.js') !!}
    </body>
</html>