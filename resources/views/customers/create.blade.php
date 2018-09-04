@extends('main')

@section('title', '- New Customer')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}
    {!! Html::style('css/dashboard.css') !!}

    <style>

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
            font-size: 1.11rem;
            font-weight: bold;
        }
        .btn:focus, .btn:hover {
            background: rgba(0, 210, 85, 0.8);
        }
        .pad{
            margin-top: 40px;
            margin-bottom: 20px;
        }
        .pad1{
            margin-top: 20px;
        }
        hr{
            display: none;
        }
        .select-wrapper span.caret{
            color: #f5f5f5;
        }
        @media (max-width: 767px) {
            .container{padding-left: 10px; padding-right: 10px;}
            .pad-0{padding: 0}
        }

    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12 pad-0">
            <h3>Create Customer</h3>
            <hr/>
            {!! Form::open(['route' => 'customers.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}

                <div class="form-group md-form pad">
                    {{ Form::label('name', 'Customer Name') }}
                    {{ Form::text('name', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                </div>

                <div class="form-group md-form pad">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::text('address', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                </div>

                <div class="form-group md-form pad">
                    {{ Form::label('phone_no', 'Phone Number') }}
                    {{ Form::text('phone_no', null, ['class' => 'inputtext form-control', 'required' => '', 'data-parsley-type'=>'number', 'data-parsley-maxlength'=>'11']) }}
                </div>

                {{ Form::submit('Add Customer', ['class' => 'inputbutton btn btn-success']) }}

            {!! form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/materialize.min.js') !!}
@endsection