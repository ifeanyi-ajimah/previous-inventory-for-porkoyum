@extends('main')

@section('title', '- Orders')

@section('stylesheets')
    {!! Html::style('css/mdb.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    <style>
        .label {
            padding: 5px;
        }
        hr{
            width: 100%;
        }
        .container{
            width: 100%;
            padding-left: 15px;
            padding-right: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .pagination li a:hover{
            background: #0D47A1;
            color: #eee;
        }
        .pagination li a, .pagination li span{
            border: 0;
            color: rgba(0,0,0,0.68);
            font-weight: bold;
        }
        .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
            color: #fff;
            background-color: gray;
            width: 180px;
            text-align: center;
        }
        .navbar-default .navbar-nav > .open:nth-child(2) > a, .navbar-default .navbar-nav > .open:nth-child(2) > a:focus, .navbar-default .navbar-nav > .open:nth-child(2) > a:hover {
            color: #fff;
            background-color: gray;
            width: 220px;
            text-align: center;
        }
        .navbar-default .navbar-nav > .open:nth-child(3) > a, .navbar-default .navbar-nav > .open:nth-child(3) > a:focus, .navbar-default .navbar-nav > .open:nth-child(3) > a:hover {
            color: #fff;
            background-color: gray;
            width: 190px;
            text-align: center;
        }
        .navbar-default .navbar-nav > .open:nth-child(4) > a, .navbar-default .navbar-nav > .open:nth-child(4) > a:focus, .navbar-default .navbar-nav > .open:nth-child(4) > a:hover {
            color: #fff;
            background-color: gray;
            width: 205px;
            text-align: center;
        }
    </style>
@endsection

{{--{!! Charts::assets() !!}--}}

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort Orders By
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <!-- <li><a href="#">Confirmed</a></li> -->
                    <li><a href="{{ route('orders.confirmed') }}">Confirmed</a></li>
                    <li><a href="{{ route('orders.unconfirmed') }}">Unconfirmed</a></li>
                    <li><a href="{{ route('orders.delivered') }}">Delivered</a></li>
                    <li><a href="{{ route('orders.undelivered') }}">Undelivered</a></li>
                    <li><a href="{{ route('orders.urgent') }}">Urgent</a></li>
                    <li><a href="{{ route('orders.noturgent') }}">Not urgent</a></li>
                </ul>
                <a class="pull-right btn btn-primary" href="{{ route('orders.create') }}">New Order</a>
            </div>

            {{--<center>--}}
                {{--{!! $chart->render() !!}--}}
            {{--</center>--}}

            <h3>{{ $heading }}</h3>
            <table class="table table-responsive text-center">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>Phone</td>
                        <th>Product</th>
                        <th>Product Quantity</th>
                        <th>Product Value</th>
                        <th>Region/Country</th>
                        <th>Comms Exec</th>
                        <th>Order Status</th>
                        <th>Created By</td>
                        <th>Created at</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <hr/>
                <tbody>
                    @if($orders->count() == 0)
                        <i>No Orders</i>
                    @else
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer->name }}</td>
                                <td>{{ $order->customer->address }}</td>
                                <td>{{ $order->customer->phone_no }}</td>
                                <td>{{ $order->product->product_name }}</td>
                                <td>{{ $order->product_quantity }}</td>
                                <td>{{ $order->product_value }}</td>
                                <td>{{ $order->state->name }}</td>
                                <td>{{ $order->commsexec->display_name }}</td>
                                <td>
                                    <span class="label label-{{ $statusText[$order->urgency_status][1] }}">
                                        {{ $statusText[$order->urgency_status][0] }}
                                    </span>
                                </td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ formatDate($order->created_at) }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('orders.edit', $order->id) }}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('orders.show', $order->id) }}">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['orders.destroy', $order->id]]) !!}
                                        <button type="submit" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="text-center">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

@endsection


@section('scripts')

@endsection