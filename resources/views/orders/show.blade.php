@extends('main')

@section('title', '- View Order')

@section('stylesheets')
    {!! Html::style('css/mdb.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    <style>
        .confirmed {
            border-left: 1px solid #D3D3D3;
            border-right: 1px solid #D3D3D3;
        }
        .odetails {
            border: 1px dashed #D3D3D3;
        }
        .hdetails {
            margin-bottom: 50px;
        }
        .hdetails h4 {
            font-weight: bold;
        }
    </style>
@endsection


@section('content')

    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">

        <div class="row">
            <h4>
                Order for <strong>{{ $order->product->product_name }}</strong>
                by <strong>{{ $order->customer->name }}</strong>
                on <strong>{{ formatDate($order->created_at) }}</strong>
                <a class="btn btn-success pull-right" href="{{ route('orders.edit', $order->id) }}">Edit this Order</a>
            </h4>
            <hr/>
        </div>

        <div class="row">
            <h4>Order Status: [taken by <strong>{{ $order->user->name }}</strong>]</h4>
            <hr/>
            <div class="col-md-4 text-center urgency">
                <h4>Urgency Status</h4>
                <span class="label label-{{ $order->urgent? 'urgent' : 'not urgent' }}">
                    {{ $order->urgent? 'urgent' : 'not urgent' }}
                </span>
            </div>
            <div class="col-md-4 text-center confirmed">
                <h4>Confirmation Status</h4>
                <span class="label label-{{ $order->confirmed? 'confirmed' : 'not confirmed' }}">
                    {{ $order->confirmed? 'confirmed' : 'not confirmed' }}
                </span>
            </div>
            <div class="col-md-4 text-center delivery">
                <h4>Delivery Status</h4>
                <span class="label label-{{ $order->delivered? 'delivered' : 'not delivered' }}">
                    {{ $order->delivered? 'delivered' : 'not delivered' }}
                </span>
            </div>
        </div>

        <br/><br/>

        <div class="row hdetails">
            <h4>Order Details</h4>
            <hr/>
            <div class="col-md-4 text-center odetails">
                <h4>Customer Name</h4>
                {{ $order->customer->name }}
            </div>
            <div class="col-md-4 text-center odetails">
                <h4>Customer Address</h4>
                {{ $order->customer->address }}
            </div>
            <div class="col-md-4 text-center odetails">
                <h4>Phone no</h4>
                {{ $order->customer->phone_no }}
            </div>
            <div class="col-md-4 text-center odetails">
                <h4>Amount Paid</h4>
                {{ $order->amount_paid ? '&#8373;'.number_format($order->amount_paid) : 'Not yet Paid' }}
            </div>
            <div class="col-md-4 text-center odetails">
                <h4>Date Paid</h4>
                {{ $order->date_paid ? $order->date_paid : 'Not yet Paid' }}
            </div>
            <div class="col-md-4 text-center odetails">
                <h4>Product</h4>
                {{ $order->product->product_name }}
            </div>
            <div class="col-md-4 text-center odetails">
                <h4>Quanity</h4>
                {{ $order->quantity }}
            </div>
            <div class="col-md-4 text-center odetails">
                <h4>Value</h4>
                &#8373; {{ number_format($order->value) }}
            </div>
            <div class="col-md-4 text-center odetails">
                <h4>Region</h4>
                {{ $order->state->name }}
            </div>
            <div class="col-md-4 text-center odetails">
                <h4>Comms Personnel</h4>
                {{ $order->commsexec->display_name }}
            </div>
            <div class="col-md-4 text-center odetails">
                <h4>Delivery Person</h4>
                {{ $order->deliveryperson ? $order->deliveryperson->fullname : 'Not yet assigned' }}
            </div>
            <div class="col-md-4 text-center odetails">
                <h4>Delivery Address</h4>
                {{ $order->delivery_address ? $order->delivery_address : 'Not Stated' }}
            </div>
        </div>

    </div>

@endsection


@section('scripts')

@endsection