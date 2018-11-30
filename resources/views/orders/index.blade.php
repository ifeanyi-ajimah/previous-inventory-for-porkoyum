@extends('main')

@section('title', '- Orders')

@section('stylesheets')
    {!! Html::style('css/mdb.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/order.css') !!}
    <style>


    </style>
@endsection

{{--{!! Charts::assets() !!}--}}

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dropdown">
                @role('admin')
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort Orders By
                    <span class="caret"></span></button>
                <ul class="dropdown-menu" style="width: 200px;">
                    <!-- <li><a href="#">Confirmed</a></li> -->
                    <li><a href="{{ route('orders.confirmed') }}">Confirmed</a></li>
                    <li><a href="{{ route('orders.unconfirmed') }}">Unconfirmed</a></li>
                    <li><a href="{{ route('orders.delivered') }}">Delivered</a></li>
                    <li><a href="{{ route('orders.undelivered') }}">Undelivered</a></li>
                    <li><a href="{{ route('orders.urgent') }}">Urgent</a></li>
                    <li><a href="{{ route('orders.noturgent') }}">Not urgent</a></li>
                </ul>
                @endrole
                <a class="pull-right btn btn-primary" href="{{ route('orders.create') }}">New Order</a>
            </div>

            {{--<center>--}}
                {{--{!! $chart->render() !!}--}}
            {{--</center>--}}

            <h3>{{ $heading }}</h3>
            <table class="table table-responsive table-hover text-center" id="shifts">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Customer</th>
                        <!--<th>Address</th>-->
                        <th>Phone</td>
                        <th>Product</th>
                        <th>Product Quantity</th>
                        <th>Product Value</th>
                        <!--<th>State/Country</th>-->
                        <!--<th>Comms Exec</th>-->
                        <!--<th>Order Status</th>-->
                        <!--<th>Created By</td>-->
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
                            @if(isset($order->product->product_name))
                            <tr>
                                <td>{{ $order->id }}</td>
                                @if($order->customer)
                                <td>{{ $order->customer->name}}</td>
                                <!--<td>{{ $order->delivery_address ?: $order->customer->address }}</td>-->
                                <td>{{ $order->customer->phone_no }}</td>
                                @else
                                <td>{{ "null" }}</td>
                                <!--<td>{{ "null" }}</td>-->
                                <td>{{ "null" }}</td>
                                @endif
                                <td>{{ $order->product->product_name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->value }}</td>
                                <!--<td>{{ $order->state->name }}</td>-->
                                <!--<td>{{ $order->commsexec? $order->commsexec->display_name : 'null' }}</td>-->
                                <!--<td>
                                    <span class="label label-{{ $order->urgent? 'urgent' : 'not urgent' }}">
                                        {{ $order->urgent? 'urgent' : 'not urgent' }}
                                    </span>
                                </td>-->
                                <!--<td>{{ $order->user->name }}</td>-->
                                <td>{{ formatDate($order->created_at) }}</td>
                                <td class="action">
                                    <a class="btn btn-primary" href="{{ route('orders.edit', $order->id) }}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </td>
                                <td class="action">
                                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#view-order-{{$order->id}}">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td><!--href="{{ route('orders.show', $order->id) }}"-->
                                <td class="action">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['orders.destroy', $order->id]]) !!}
                                        <button type="submit" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="text-center">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    <!--======MODALS SECTION ======-->
    <secction>
        @foreach($orders as $order)
        @if(isset($order->product->product_name))
        <div id="view-order-{{$order->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close close-custom" data-dismiss="modal"><span class="x-close">&times</span></button>
                        <h3 class="modal-title">Order Details</h3>
                    </div>
                    <div class="modal-body">

                        <table>
                            <tbody>
                                <tr>
                                    <td class="h4">Name: </td>
                                    <td class="text-right">{{ $order->customer->name}}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Phone: </td>
                                    <td class="text-right">{{ $order->customer->phone_no }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Address: </td>
                                    <td class="text-right">{{ $order->delivery_address ?: $order->customer->address }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Product: </td>
                                    <td class="text-right">{{ $order->product->product_name }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Quantity: </td>
                                    <td class="text-right">{{ $order->quantity }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Value: </td>
                                    <td class="text-right">{{ $order->value }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Region/Country: </td>
                                    <td class="text-right">{{ $order->state->name }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Comms Executive: </td>
                                    <td class="text-right">{{ $order->commsexec? $order->commsexec->display_name : 'null' }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Order Status: </td>
                                    <td class="text-right">{{ $order->urgent? 'urgent' : 'not urgent' }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Created By: </td>
                                    <td class="text-right">{{ $order->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Created At: </td>
                                    <td class="text-right">{{ formatDate($order->created_at) }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </secction>
@endsection


@section('scripts')
    <script src="js/colResizable-1.6.js"></script>
    <script>
        $("#shift").colResizable({liveDrag:true});
    </script>
@endsection
