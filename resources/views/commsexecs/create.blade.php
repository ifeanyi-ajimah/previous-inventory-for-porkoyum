@extends('main')

@section('title', '- Create New Comms Exec')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}
    {!! Html::style('css/login.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    <style>
        .inputbutton {
            width: 160px;
        }
        .caret{
            border-color: transparent !important;
        }
        .select-wrapper ul{
            list-style: none;
        }
        .select-wrapper span.caret {
            right: 7px;
            top: -15px;
            font-size: 10px;
        }
        .select-wrapper input.select-dropdown{
            font-size: 1.2rem;
            font-weight: bold;
        }
        .select-dropdown{
            /*width: 100% !important;*/
            padding-left: 0px !important;
        }
        label{
            color: #808080;
            font-size: 1rem;
        }
        .md-form label{
            font-size: 1.3rem;
            display: block;
            top: -1.2rem;
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
            font-size: 1.11rem;
            font-weight: 100 !important;
        }
        .btn:focus, .btn:hover{
            background: rgba(0, 210, 85,0.8);
        }
        .pad{
            margin-top: 40px;
            margin-bottom: 20px;
        }
        .md-form label.active{
            font-size: 1rem;
        }
        .select-wrapper span.caret{
            color: #f5f5f5;
        }
        .footer {
            bottom: -165px !important;
        }
    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">

            <h3>Add New Comms Exec</h3>
            <hr/>

            {!! Form::open(['route' => 'commsexecs.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}

                <div class="md-form">
                    <label for="commsexecs">Select a User</label>
                    <select name="user_id" class="inputtext" required>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md-form">
                    {{ Form::label('productcategories_id', 'Product Category') }}
                    <select class="inputtext" name="productcategories_id" required>
                        @foreach($product_categories as $product_category)
                            <option value="{{ $product_category->id }}">{{ $product_category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                {{ Form::submit('Attach CommsExec', ['class' => 'inputbutton btn btn-primary']) }}

            {!! form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/materialize.min.js') !!}

    <script>
        //initialize materialize select
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@endsection