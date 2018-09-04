@extends('main')

@section('title', '- All Comms Reps')

@section('stylesheets')
    {!! Html::style('css/input-material.css') !!}
    {!! Html::style('css/dashboard.css') !!}

    <style>
        .btn-success{
            background: #00D255;
            font-size: 1.11rem;
            font-weight: bold;
        }
        .action{
            width: 56px;
        }
        .action .btn{
            padding: 3px 12px;
            border-radius: 3.5px;
            font-size: inherit;
        }
        .btn-success:focus, .btn-success:hover {
            background: rgba(0, 210, 85, 0.8);
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
        }
        .input-field input[type="search"]:focus {
            background: transparent;
            color: white;
        }
        .row{
            margin-left: 0;
        }
    </style>
@endsection


@section('content')

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
            <h3>Comms Execs Management <a class="pull-right btn btn-success" href="{{ route('commsexecs.create') }}" target="_blank">Create New Comms Exec</a></h3>
            <hr/>
            @if($commsexecs->count() == 0)
                <h4>No Comms Reps</h4>
            @else
                <table class="table table-responsive text-center" id="searcher">
                    <thead>
                    <tr>
                        <td>S/N</td>
                        <td>Full Name</td>
                        <td>Display Name</td>
                        <td>Product attached to</td>
                        <td>Orders Taken</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commsexecs as $commsexec)
                        <tr>
                            <td>{{ $commsexec->id }}</td>
                            <td>{{ $commsexec->fullname }}</td>
                            <td>{{ $commsexec->display_name }}</td>
                            <td>{{ $commsexec->productcat->category_name }}</td>
                            <td><span class="label label-success">{{ $commsexec->orders->count() }}</span></td>
                            <td class="action">
                                <a class="btn btn-success" href="{{ route('commsexecs.show', $commsexec->id) }}">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                            </td>
                            <td class="action">
                                <a class="btn btn-primary" href="{{ route('commsexecs.edit', $commsexec->id) }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                            </td>
                            <td class="action">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['commsexecs.destroy', $commsexec->id]]) !!}
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <div class="text-center">
        {{ $commsexecs->links() }}
    </div>

@endsection


@section('scripts')

    {!! Html::script('js/datatables.js') !!}
    {!! Html::script('js/materialize.min.js') !!}

    <script>
        $(document).ready(function() {
            $('#searcher').DataTable();
            $(".dataTables_filter").addClass("input-field");
        });
    </script>

@endsection