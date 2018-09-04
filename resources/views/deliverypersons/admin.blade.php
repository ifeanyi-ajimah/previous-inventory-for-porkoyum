<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Inventory</title>

    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/input-material.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/component.css">
    <link rel="stylesheet" href="/css/styles.css">
    <meta name="_token" content={{csrf_token()}}>
</head>

<body class="inverse">

@include('partials._nav')
@include('partials._messages')

<section>
    <div class="col-sm-12 col-xs-12">
        <h2 class="text-center state">Assigned Deliveries</h2>
        <div class="tab">
            <table id="table" class="table">
                <thead>
                <tr>
                    <td></td>
                    <td>Product</td>
                    <td>Quantity</td>
                    <td>Customer</td>
                    <td>Address</td>
                    <td>Phone</td>
                    <td>Amount</td>
                    <td>Comment</td>
                    <td>Status</td>
                    <td>Confirm?</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $order->product->product_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->delivery_address? $order->delivery_address : $order->customer->address }}</td>
                        <td>{{ $order->customer->phone_no }}</td>
                        <td>&#8373; {{ number_format($order->value) }}</td>
                        <td>{{ $order->comment }}</td>
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
                            @endif
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

    <div class="md-overlay"></div>
<script src="/js/app.js"></script>
<script src="/js/materialize.min.js"></script>
<script src="/js/classie.js"></script>
<script src="/js/modalEffects.js"></script>

<script>
    //initialize material select
    $(document).ready(function() {
        $('select').material_select();
    });
    $('.md-trigger').click(function(){
        var formAction = $('#comment').attr('action')
        $('#comment').attr('action', formAction+"/"+$(this).attr('data-order-id'))
    });
    $('.confirm').click(function(){
        var formAction = $(this).attr('data-url')
        var newFrom = document.createElement('form')
        var input = document.createElement('input')
        $(newFrom).attr('method','post')
        $(newFrom).attr('action',formAction)
        $(newFrom).attr('id','newFrom')

        $(input).attr('type','hidden')
        $(input).attr('name','_token')
        $(input).attr('value',$('meta[name="_token"]').attr('content'))
        
        newFrom.appendChild(input)
        document.body.appendChild(newFrom)
        newFrom.submit()
    });
</script>
</body>
</html>