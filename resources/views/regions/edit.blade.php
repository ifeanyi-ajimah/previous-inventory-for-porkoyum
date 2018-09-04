@extends('main')

@section('title', '- Edit Serice Zones')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/login.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}

    <style>
        .inputbutton {
            width: 120px;
        }
        input[type="text"]:not(.browser-default){
            font-size: 1.5rem;
        }
        .navbar-default{
            border: none;
        }
    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">

            <h4>Edit Service Zone <a class="pull-right btn btn-primary" href="{{ route('region.index') }}">Go back to Service Zones</a></h4>
            <hr/>
            {!! Form::model($region, ['route' => ['region.update', $region->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Service Zone Name') }}
                    {{ Form::text('name', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                </div>

                {{ Form::submit('Update Region', ['class' => 'inputbutton btn btn-primary']) }}

            {!! form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection