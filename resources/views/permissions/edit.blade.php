@extends('main')

@section('title', '- Edit Permission')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}
    {!! Html::style('css/login.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    <style>
        .inputbutton {
            width: 150px;
        }
        .md-form label{
            font-size: 1.3rem;
            display: block;
        }
        input[type="text"]:not(.browser-default), input[type="number"]:not(.browser-default){
            font-size: 1.3rem;
            font-weight: bold;
        }
        .md-form input[type="text"]:not(.browser-default), .md-form input[type="number"]:not(.browser-default){
            font-size: 1.5rem;
        }
        input[type="text"]:focus:not(.browser-default):not([readonly]),input[type="number"]:focus:not(.browser-default):not([readonly]){
            border-bottom: 1px solid #00D255;
            -webkit-box-shadow: 0 1px 0 0 #00D255;
            box-shadow: 0 1px 0 0 #00D255;
        }
        .btn{
            background: #00D255;
            font-family: arial;
            font-size: 1.05rem;
            font-weight: 100 !important;
        }
        .btn:focus, .btn:hover{
            background: rgba(0, 210, 85,0.8);
        }
        .md-form label.active{
            font-size: 1rem;
        }
        .select-wrapper span.caret{
            color: #f5f5f5;
        }
    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">

            <h3>Edit Permission <a class="pull-right btn btn-primary" href="{{ route('permissions.index') }}">Go back to Permissions</a></h3>
            <hr/>
            {!! Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}

            <div class="form-group md-form">
                {{ Form::label('name', 'Permission Name') }}
                {{ Form::text('name', null, ['class' => 'inputtext form-control']) }}
            </div>

            <div class="form-group md-form">
                {{ Form::label('display_name', 'Display Name') }}
                {{ Form::text('display_name', null, ['class' => 'inputtext form-control']) }}
            </div>

            <div class="form-group md-form">
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', null, ['class' => 'inputtext form-control']) }}
            </div>

            {{ Form::submit('Update Permission', ['class' => 'inputbutton btn btn-primary']) }}

            {!! form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/materialize.min.js') !!}
@endsection