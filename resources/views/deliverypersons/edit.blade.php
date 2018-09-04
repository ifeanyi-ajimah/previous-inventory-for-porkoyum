@extends('main')

@section('title', '- Edit Delivery Person')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/login.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}
    <style>
        .inputbutton {
            width: 120px;
        }
        label{
            color: #808080;
            font-size: 1.5rem;
            display: none;
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
        }
        .btn:focus, .btn:hover{
            background: rgba(0, 210, 85,0.8);
        }
        .footer{
            bottom: -320px !important;
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
    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">

            <h3 style="text-align: left;">Edit Delivery Person <a class="pull-right btn btn-primary" href="{{ route('deliverypersons.index') }}">Go back to Delivery Persons</a></h3>
            <hr/>
            {!! Form::model($deliveryPerson, ['route' => ['deliverypersons.update', $deliveryPerson->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}

                <div class="form-group md-form">
                    {{ Form::label('fullname', 'Full Name') }}
                    {{ Form::text('fullname', null, ['class' => 'inputtext', 'required' => '']) }}
                </div>
                <div class="md-form">
                    <select name="state" class="inputtext" required>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>

                {{ Form::submit('Update DP', ['class' => 'inputbutton btn btn-primary']) }}

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