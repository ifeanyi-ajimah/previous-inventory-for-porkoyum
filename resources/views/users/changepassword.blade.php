@extends('main')

@section('title', '- Change Password')

@section('stylesheets')
    {!! Html::style('css/users.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/parsley.css') !!}
@endsection


@section('content')

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12">

            <h3>Change Password</h3>
            <hr/>
            {!! Form::open(['route' => 'user.changepassword', 'method' => 'PUT', 'data-parsley-validate' => '']) !!}

                {{ Form::hidden('email', $email) }}

                <div class="form-group">
                    {{ Form::label('password', 'New Password') }}
                    {{ Form::password('password', ['class' => 'inputtext form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('confirm-password', 'Confirm New Password') }}
                    {{ Form::password('confirm-password', ['class' => 'inputtext form-control']) }}
                </div>

                {{ Form::submit('Update Password', ['class' => 'inputbutton btn btn-primary']) }}

            {!! Form::close() !!}
            
        </div>
    </div>

@endsection


@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection