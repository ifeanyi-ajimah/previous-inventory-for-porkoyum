@extends('main')

@section('title', '- All Regions')

@section('stylesheets')
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}

    <style>
        input[type="text"]:not(.browser-default){
            font-size: 1.3rem;
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
        .dataTables_length{
            display: none;
        }
        .dataTables_filter.input-field label{
            position: relative;
            top: 0;
            width: 100%;
            padding: 0;
        }
        .input-field input[type="search"]{
            padding: 0;
            font-size: 14px;
        }
        .input-field input[type="search"]:focus {
            background: transparent;
            color: white;
        }
    </style>
    
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <h3>Add New Region</h3>
            <hr/>
            {!! Form::open(['route' => 'states.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}

                <div class="md-form">
                    {{ Form::label('name', 'Region Name') }}
                    {{ Form::text('name', null, ['class' => 'inputtext', 'required' => '', 'id' => 'name']) }}
                    <p class="error text-center alert alert-danger hidden"></p>
                </div>
                <div class="md-form">
                    {{ Form::label('region', 'Select Service Zone') }}
                    <select class="inputtext" name="region">
                        @foreach($regions as $region)
                        <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                    <p class="error text-center alert alert-danger hidden"></p>
                </div>

                {{ Form::submit('Add Region', ['class' => 'inputbutton btn btn-success', 'id' => 'addstate']) }}

            {!! form::close() !!}
        </div>
    </div>

    <br/>

    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <h3 class="text-center">Regions</h3>
            {{--<a class="btn btn-success pull-right" href="{{ route('states.create') }}">Add Region</a>--}}

            <table class="table table-responsive details" id="statetable">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Orders</th>
                    <th>Service Zone</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($states as $state)
                        <tr>
                            <td>{{ $state->id }}</td>
                            <td>{{ $state->name }}</td>
                            <td>
                                <span class="label label-default">{{ $state->orders->count() }}</span>
                            </td>
                            <td>{{ $state->region? $state->region->name : "no set region" }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('states.edit', $state->id) }}">
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
    {!! Html::script('js/datatables.js') !!}
    <script>
        //initialize material select
        $(document).ready(function() {
            $('select').material_select();
            $('#statetable').DataTable();
            $(".dataTables_filter").addClass("input-field");
        });
        {{--$("#addstate").click(function() {--}}

            {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--url: "{{ url('/states') }}",--}}
                {{--data: {--}}
                    {{--'_token': $('input[name=_token]').val(),--}}
                    {{--'name': $('input[name=name]').val()--}}
                {{--},--}}
                {{--success: function(data) {--}}
                    {{--if ((data.errors)) {--}}
                        {{--$('.error').removeClass('hidden');--}}
                        {{--$('.error').text(data.errors.name);--}}
                    {{--} else {--}}
                        {{--$('.error').remove();--}}
                        {{--$('#statetable').append(--}}
                                {{--"<tr class='item" + data.id + "'>" +--}}
                                    {{--"<td>" + data.id + "</td>" +--}}
                                    {{--"<td>" + data.name + "</td>" +--}}
                                    {{--"<td>" +--}}
                                        {{--"<button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'>" +--}}
                                            {{--"<span class='glyphicon glyphicon-pencil'></span>" +--}}
                                        {{--"</button>" +--}}
                                        {{--"<button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'>" +--}}
                                            {{--"<span class='glyphicon glyphicon-trash'></span>" +--}}
                                        {{--"</button>" +--}}
                                    {{--"</td>" +--}}
                                {{--"</tr>");--}}
                    {{--}--}}
                {{--},--}}
            {{--});--}}
            {{--$('#name').val('');--}}
        {{--});--}}
    </script>
@endsection