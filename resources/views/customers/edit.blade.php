@extends('main')

@section('title', '- Edit Permission')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/login.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}
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
        }
        .btn:focus, .btn:hover{
            background: rgba(0, 210, 85,0.8);
        }
    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">

            <h3>Edit Customer <a class="pull-right btn btn-primary" href="{{ route('customers.index') }}">Back to Customers</a></h3>
            <hr/>
            {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}

                <div class="form-group md-form">
                    {{ Form::label('name', 'Customer Name') }}
                    {{ Form::text('name', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                </div>

                <div class="form-group md-form">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::text('address', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                </div>

                <div class="form-group md-form">
                    {{ Form::label('phone_no', 'Phone Number') }}
                    {{ Form::text('phone_no', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                </div>

                {{ Form::submit('Update Customer', ['class' => 'inputbutton btn btn-info']) }}

            {!! form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/materialize.min.js') !!}

@endsection