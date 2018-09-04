@extends('main')

@section('title', '- Edit Region')

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
        .select-wrapper span.caret{
            right: 10px;
            top: -8px;
            border: transparent;
        }
        .dropdown-content.select-dropdown{
            list-style: none;
            padding-right: 0;
            padding-left: 0;
        }
        .md-form {
            margin-top: 3.5rem;
        }
        .md-form label{
            top: 0;
        }
        .md-region label{
            top: -1.2rem;
        }
    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">

            <h4>Edit Region <a class="pull-right btn btn-primary" href="{{ route('states.index') }}">Go back to Regions</a></h4>
            <hr/>
            {!! Form::model($state, ['route' => ['states.update', $state->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}

                <div class="md-form">
                    {{ Form::label('name', 'Region Name') }}
                    {{ Form::text('name', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                </div>

                <div class="md-form md-region">
                    {{ Form::label('region', 'Select Service Zone') }}
                    <select class="inputtext" name="region">
                        @foreach($regions as $region)
                        @if($state->region && $region->id == $state->region->id)
                        <option value="{{$region->id}}" selected>{{$region->name}}</option>
                        @else
                        <option value="{{$region->id}}">{{$region->name}}</option>
                        @endif
                        @endforeach
                    </select>
                    <p class="error text-center alert alert-danger hidden"></p>
                </div>

                {{ Form::submit('Update Region', ['class' => 'inputbutton btn btn-primary']) }}

            {!! form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/materialize.min.js') !!}

    <script>
        //initialize material select
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@endsection