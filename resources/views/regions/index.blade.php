@extends('main')

@section('title', '- All Service Zones')

@section('stylesheets')
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}

    <style>
        input[type="text"]:not(.browser-default){
            font-size: 1.3rem;
        }
    </style>
    
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <h3>Add New Service Zone</h4>
            <hr/>
            {!! Form::open(['route' => 'region.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Service Zone Name') }}
                    {{ Form::text('name', null, ['class' => 'inputtext form-control', 'required' => '', 'id' => 'name']) }}
                    <p class="error text-center alert alert-danger hidden"></p>
                </div>

                {{ Form::submit('Add Service Zone', ['class' => 'inputbutton btn btn-primary', 'id' => 'add']) }}

            {!! form::close() !!}
        </div>
    </div>

    <br/>

    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <h4>Service Zones</h4>
            {{--<a class="btn btn-success pull-right" href="{{ route('region.create') }}">Add Service Zone</a>--}}
            <hr/>

            <table class="table table-responsive details" id="regiontable">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Regions</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($regions as $region)
                        <tr>
                            <td>{{ $region->id }}</td>
                            <td>{{ $region->name }}</td>
                            <td>
                                <span class="label label-default">{{ $region->states->count() }}</span>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('region.edit', $region->id) }}">
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
    <script>
        {{--$("#add").click(function() {--}}

            {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--url: "{{ url('/region') }}",--}}
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
                        {{--$('#regiontable').append(--}}
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