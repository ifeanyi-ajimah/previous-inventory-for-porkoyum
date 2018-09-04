@extends('main')

@section('title', '- Delivery Persons')

@section('stylesheets')
    {!! Html::style('css/fonts.css') !!}
    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/font-awsome.min.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/input-material.css') !!}
    {!! Html::style('css/normalize.css') !!}
    {!! Html::style('css/component.css') !!}
    {!! Html::style('css/styles.css') !!}

    <style>
        @media (min-width: 787px) {
            .navbar-default {
                background: transparent;
                border: 1px solid transparent;
            }
        }
    </style>
@endsection

@section('content')
    <section>
    <div class="col-sm-12 col-xs-12">
        <h2 class="text-center state">My Assigned Deliveries</h2>
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
                    <td></td>
                </tr>
                </thead>
                <tbody>
                    @if($orders)
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $order->product->product_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->delivery_address? $order->delivery_address : $order->customer->address }}</td>
                        <td>{{ $order->customer->phone_no }}</td>
                        <td>&#8373; {{ number_format($order->value) }}</td>
                        @if($order->delivered)
                        <td class="text-success">Delivered</td>
                        @else
                            @if($order->cancelled)
                        <td class="text-danger">Cancelled</td>
                            @else
                        <td>
                            <button class="btn btn-success btn-xs deliver" data-url="{{url('change-status')}}/{{$order->id}}">Deliver</span></button>
                            <button class="btn btn-danger btn-xs md-trigger" data-modal="change-stat" data-url="{{ url('cancel-order') }}/{{$order->id}}">Cancel</span></button>
                        </td>
                            @endif
                        @endif
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
    <div class="md-modal md-effect-1" id="change-stat">
        <div class="md-content">
            <h3>Why did the customer cancel?
                <span class="x-close pull-right remove">
                    <span class="fa fa-remove md-close"></span>
                </span>
            </h3>
            <div>
                <form id="comment" action="" method="post">
                    {{csrf_field()}}
                    <div class="input-field col-xs-12 pad-0">
                        <input type="text" name="comment">
                    </div>

                    <button class="btn btn-primary btn-custom md-close2" type="submit" id="submit3">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <div class="md-modal md-effect-1" id="change-stat">
        <div class="md-content">
            <h3>Was this mobile money payment?
                <span class="x-close pull-right remove">
                    <span class="fa fa-remove md-close"></span>
                </span>
            </h3>
            <div>
                <form id="payment" action="" method="post">
                    {{csrf_field()}}
                    <div class="input-field col-xs-12 pad-0">
                        Yes <input type="radio" name="payment_type" value="1">
                    </div>
                    <div class="input-field col-xs-12 pad-0">
                        No <input type="radio" name="payment_type" value="0">
                    </div>

                    <button class="btn btn-primary btn-custom md-close2" type="submit">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <div class="md-overlay"></div>
@endsection

@section('scripts')
    {!! Html::script('js/materialize.min.js') !!}
    {!! Html::script('js/classie.js') !!}
    {!! Html::script('js/modalEffects.js') !!}
    <script>
    //initialize material select
    $(document).ready(function() {
        $('select').material_select();
    });
    $('.md-trigger').click(function(){
        $('#comment').attr('action', $(this).attr('data-url'))
        $('#payment').attr('action', $(this).attr('data-url'))
    });
</script>
@endsection