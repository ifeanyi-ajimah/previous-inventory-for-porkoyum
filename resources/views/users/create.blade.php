@extends('main')

@section('title', '- Create New Users')

@section('stylesheets')
    {!! Html::style('css/users.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}
    {!! Html::style('css/dashboard.css') !!}

    <style>
        .caret{
            border-color: transparent !important;
        }
        .select-wrapper ul{
            list-style: none;
        }
        .select-wrapper span.caret {
            right: 7px;
            top: -20px;
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
            font-size: 0.8rem;
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
        input[type="text"]:focus:not(.browser-default):not([readonly]),input[type="number"]:focus:not(.browser-default):not([readonly]),
        input[type="password"]:focus:not(.browser-default):not([readonly]){
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
        .select-wrapper span.caret{
            color: #f5f5f5;
        }
    </style>
@endsection


@section('content')

    <div class="row" id="app">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12">

            <h3>Create New User</h3>
            <hr/>

            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

                <div class="form-group md-form">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, ['class' => '', 'required' => '']) }}
                </div>

                <div class="form-group md-form">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', null, ['class' => '', 'required' => '']) }}
                </div>

                <div class="form-group md-form">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password', ['class' => '', 'required' => '']) }}
                </div>

                <div class="form-group md-from">
                    {{ Form::label('confirm-password', 'Confirm Password') }}
                    {{ Form::password('confirm-password', ['class' => '', 'required' => '']) }}
                </div>

                <div class="form-group">
                    <select class="inputtext" name="role">
                        <option>Select a role</option>
                        @foreach($roles as $id => $value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>

                <example></example>
                {{--<quantity></quantity>--}}

                {{ Form::submit('Add User', ['class' => 'inputbutton btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/materialize.min.js') !!}

    <script>
        //initialize materialize select
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@endsection