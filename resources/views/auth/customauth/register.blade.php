@extends('main')

@section('title', '- login')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/login.css') !!}
@endsection


@section('content')

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-xs-12 register">
            <h3>Register User</h3>
            <hr/>
           {!! Form::open(['data-parsley-validate' => '']) !!}
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, ['class' => 'inputtext form-control']) }}

	            {{ Form::label('email', 'Email') }}
	            {{ Form::email('email', null, ['class' => 'inputtext form-control']) }}

                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['class' => 'inputtext form-control']) }}

                {{ Form::label('password_confirmation', 'Confirm Password') }}
                {{ Form::password('confirm-password', ['class' => 'inputtext form-control']) }}

                {{ Form::label('roles', 'Role(s)') }}
                <select class="inputtext form-control" name="role">
                    <option>Select a role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->display_name}}</option>
                    @endforeach
                </select>

	            {{ Form::submit('Register', ['class' => 'inputbutton btn btn-primary']) }}
	            
	        {!! Form::close() !!}
            
        </div>
    </div>

@endsection


@section('styles')
    {!! Html::script('js/parsley.min.js') !!}
@endsection