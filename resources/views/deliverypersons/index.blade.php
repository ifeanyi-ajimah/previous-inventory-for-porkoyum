@extends('main')

@section('title', '- Delivery Persons')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}
    {!! Html::style('css/dashboard.css') !!}

    <style>
        .navbar .navbar-brand{
            font-weight: 400;
        }

        label{
            color: #808080;
            font-size: 1.5rem;
            display: none;
        }
        .md-form label{
            font-size: 1rem;
            display: block;
        }
        .md-form label.active{
            font-size: 1rem;
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
        hr{
            display: none;
        }
        h3{
            font-weight: 100;
        }
        .select-wrapper span.caret{
            right: 10px;
            top: -36px;
            border: transparent;
        }
        .md-form label.select{
            top: -15px;
        }
        .md-form{
            margin-bottom: 25px;
        }
        .dropdown-content.select-dropdown{
            padding-right: 0;
            padding-left: 0;
            list-style: none;
        }
    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <h3>New Delivery Person</h3>
            <hr/>
            {!! Form::open(['route' => 'deliverypersons.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
                <div class="md-form">
                    <label for="deliverypersons" class="select">Select a User</label>
                    <select name="user_id" class="inputtext" required>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md-form">
                    <label for="deliverypersons" class="select">Select a Region</label>
                    <select name="state" class="inputtext" required>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>

                {{ Form::submit('Add Delivery Persons', ['class' => 'inputbutton btn btn-primary']) }}

            {!! form::close() !!}
        </div>
    </div>

    <br/>

    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <h4>Delivery Persons</h4>
            <hr/>

            <table class="table table-responsive details">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Orders Handled</th>
                        <th>Region</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deliveryPersons as $deliveryPerson)
                        <tr>
                            <td>{{ $deliveryPerson->id }}</td>
                            <td> <a href="{{ url('delivery')}}/{{$deliveryPerson->id}}">{{ $deliveryPerson->fullname }}</a></td>
                            <td>{{ $deliveryPerson->orders_count }}</td>
                            <td>{{ $deliveryPerson->state }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('deliverypersons.edit', $deliveryPerson->id) }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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