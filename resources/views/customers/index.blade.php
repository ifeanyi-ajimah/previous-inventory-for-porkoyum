@extends('main')

@section('title', '- All Customers')

@section('stylesheets')
    {!! Html::style('css/input-material.css') !!}
    {!! Html::style('css/dashboard.css') !!}

    <style>
        .fo{ font-size: 30px; }
        @media (max-width: 767px) {
            .fo{ font-size: 20px; }
            .fo .btn{ margin-top: -5px; }
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
    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            <h4 class="fo"> Customers <a class="btn btn-success pull-right" href="{{ route('customers.create') }}">Create Customer</a></h4>
            <hr/>

            <table class="table table-responsive details" id="searcher">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Orders</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone_no }}</td>
                            <td><label class="label label-success">{{ $customer->orders_count }}</label></td>
                            <td>
                                <a class="btn btn-info" href="{{ route('customers.show', $customer->id) }}">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                <a class="btn btn-primary" href="{{ route('customers.edit', $customer->id) }}">
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
    {!! Html::script('js/materialize.min.js') !!}
    {!! Html::script('js/datatables.js') !!}

    <script>
        $(document).ready(function() {
            $('#searcher').DataTable();
            $(".dataTables_filter").addClass("input-field");
        });
    </script>
@endsection