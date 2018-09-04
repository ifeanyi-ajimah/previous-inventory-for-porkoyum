@extends('main')

@section('title', '- Deliveries')

@section('stylesheets')
    {!! Html::style('css/mdb.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/input-material.css') !!}
    <style>
        .modal-body{
            color: black;
        }
        .modal-body table{
            margin: 0 auto;
        }
        .modal-body td{
            padding: 5px;
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

{{--{!! Charts::assets() !!}--}}

@section('content')

    <div class="row">
        <div class="col-sm-12 col-xs-12">
        <h2 class="text-center state">All Deliveries</h2>
        <div class="tab">
            <table class="table table-responsive table-bordered text-center" id="searcher">
                <thead>
                <tr>
                    <td></td>
                    <td>Product</td>
                    <td>Quantity</td>
                    <td>Customer</td>
                    <td>Amount</td>
                    <td>Region</td>
                    <td>Del. Person</td>
                    <td>Status</td>
                    <td>Confirm?</td>
                    <td>Full info</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>&#8373; {{ number_format($order->value) }}</td>
                        <td>{{ $order->state->name }}</td>
                        <td>{{ $order->deliveryperson->fullname }}</td>
                        @if($order->delivered)
                            @if($order->confirmed)
                        <td class="text-success">Delivered</td>
                        <td class="text-muted">Confirmed</td>
                            @else
                        <td class="text-success">Delivered</td>
                        <td>
                            <button class="btn btn-success btn-xs confirm" data-url="{{url('confirm-delivery')}}/{{$order->id}}">Yes</span></button>
                        </td>
                            @endif
                        @else
                            @if($order->cancelled)
                                @if($order->confirmed)
                        <td class="text-warning">Cancelled</td>
                        <td class="text-muted">Confirmed</td>
                                @else
                        <td class="text-warning">Cancelled</td>
                        <td>
                            <button class="btn btn-success btn-xs confirm" data-url="{{url('confirm-cancellation')}}/{{$order->id}}">Yes</span></button>
                        </td>
                                @endif
                            @else
                        <td class="text-warning">Pending</td>
                        <td class="text-warning"></td>
                            @endif
                        @endif
                        <td class="action">
                            <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#view-order-{{$order->id}}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                                    <td class="text-right">&#8373; {{ number_format($order->value) }}</td>
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
<!--     <script src="js/colResizable-1.6.js"></script>
    <script>
        $("#shift").colResizable({liveDrag:true});
    </script> -->
    {!! Html::script('js/datatables.js') !!}
    {!! Html::script('js/materialize.min.js') !!}
    <script>
        $(document).ready(function() {
            $('#searcher').DataTable();
            $(".dataTables_filter").addClass("input-field");
            $(".dataTables_filter").appendTo(".md-form");
        });
    </script>
@endsection