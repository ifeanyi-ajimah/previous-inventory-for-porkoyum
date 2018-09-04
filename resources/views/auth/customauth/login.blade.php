@extends('main')

@section('title', '- login')

@section('stylesheets')
    {!! Html::style('css/mdb.css') !!}
    {!! Html::style('css/compiled.css') !!}
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/login.css') !!}

    <style>
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px #171B1F inset !important;
            -webkit-text-fill-color: white;
        }
    </style>
@endsection


@section('content')

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-xs-12">
            <h3>Login</h3>
            <hr/>
           {!! Form::open(['data-parsley-validate' => '']) !!}

            <div class="md-form">
	            {{ Form::label('email', 'Email') }}
	            {{ Form::email('email', null, ['class' => 'inputtext form-control', 'id' => 'email']) }}
            </div>
            <div class="md-form">
	            {{ Form::label('password', 'Password') }}
	            {{ Form::password('password', ['class' => 'inputtext form-control', 'id' => 'password']) }}
            </div>

	            {{ Form::submit('Login', ['class' => 'inputbutton btn btn-primary']) }}
	            <br/>
                <div>
                    {{ Form::checkbox('remember') }}{{ Form::label('remember', 'Remember Me', ['class' => 'remember']) }}
                    {{--<a href="{{ url('/password/reset') }}" class="pull-right">Forget Password ?</a>--}}
                </div>

	        {!! Form::close() !!}
            
        </div>
    </div>

@endsection


@section('scripts')
    {!! Html::script('js/mdb.js') !!}
    {!! Html::script('js/parsley.min.js') !!}
@endsection