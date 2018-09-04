@extends('main')

@section('title', '- Edit Order')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}
    {!! Html::style('https://unpkg.com/flatpickr/dist/flatpickr.min.css') !!}
    <style>
        .inputbutton {
            margin-left: 15px;
        }

        /*.bottom_spacing {
            margin-bottom: 20px;
        }*/
        .caret{
            border-color: transparent !important;
        }
        .select-wrapper ul{
            list-style: none;
        }
        .select-wrapper span.caret {
            right: 7px;
            top: 0px;
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
            font-size: .8rem;
            /*display: none;*/
        }
        .md-form label{
            font-size: 1.3rem;
            display: block;
        }
        input[type="text"]:not(.browser-default), input[type="number"]:not(.browser-default){
            font-size: 1.3rem;
            font-weight: bold;
        }
        .md-form input[type="text"]:not(.browser-default), .md-form input[type="number"]:not(.browser-default){
            font-size: 1.5rem;
        }
        input[type="text"]:focus:not(.browser-default):not([readonly]),input[type="number"]:focus:not(.browser-default):not([readonly]){
            border-bottom: 1px solid #00D255;
            -webkit-box-shadow: 0 1px 0 0 #00D255;
            box-shadow: 0 1px 0 0 #00D255;
        }
        .btn{
            background: #00D255;
            font-family: arial;
            font-size: 1.05rem;
        }
        .btn:focus, .btn:hover{
            background: rgba(0, 210, 85,0.8);
        }
        .pad{
            margin-top: 40px;
            margin-bottom: 20px;
        }
        .pad1{
            margin-top: 20px;
        }
        .navbar{
            margin-bottom: 0px;
        }
        .dropdown-content li > span{
            color: #000;
        }
        input[type="text"][readonly="readonly"]:not(.browser-default){
            color: #898181;
        }
        .select-wrapper span.caret{
            color: #f5f5f5;
        }
        @media (min-width: 767px) {
            .bottom_spacing label{
                left: 4%;
            }

        }

    </style>
@endsection


@section('content')

    <div class="row" id="app">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">

            <h3>Edit Order <a class="btn btn-primary pull-right" href="{{ url('orders') }}">Back to Orders</a></h3>
            <hr/>

            {!! Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}

                <div class="col-md-6">

                    <div class="form-group">
                        {{ Form::label('confirmed_status', 'Confirmed Status') }}
                        <select name="confirmed" class="" required>
                            @if($order->confirmed)
                            <option value="1" selected>CONFIRMED</option>
                            <option value="0">NOT CONFIRMED</option>
                            @else
                            <option value="1">CONFIRMED</option>
                            <option value="0" selected>NOT CONFIRMED</option>
                            @endif
                        </select>
                    </div>

                    <div class="form-group md-form">
                        {{ Form::label('customer_id', 'Customer') }}
                        {{ Form::hidden('customer_id', $order->customer->id) }}
                        {{ Form::text('customer_name', $order->customer->name, array('class' => '', 'required' => '', 'readonly' => true)) }}
                    </div>

                    {{--<div class="form-group">--}}
                        {{--{{ Form::label('product_cat_id', 'Product Category') }}--}}
                        {{--{{ Form::select('product_cat_id', $product_cats, null, array('id' => "product_cat", 'class' => 'inputtext form-control', 'required' => '')) }}--}}
                    {{--</div>--}}

                    <div class="form-group md-form">
                        {{ Form::label('product_id', 'Product') }}
                        {{ Form::hidden('product_id', $order->product->id) }}
                        {{ Form::text('product_name', $order->product->product_name, array('class' => '', 'required' => '', 'readonly' => true)) }}
                    </div>

                    <div class="form-group md-form">
                        {{ Form::label('product_quantity', 'Quantity') }}
                        {{ Form::number('quantity', null, ['class' => '']) }}
                    </div>

                    <div class="form-group md-form">
                        {{ Form::label('product_value', 'Value') }}
                        {{ Form::tel('value', null, ['class' => '']) }}
                    </div>


                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        {{ Form::label('state_id', 'Region') }}
                        {{ Form::select('state_id', $states, null, array('class' => '')) }}
                    </div>

                    <div class="form-group md-form">
                        {{ Form::label('amount_paid', 'Amount Paid') }}
                        {{ Form::text('amount_paid', null, ['class' => '']) }}
                    </div>
                    <div class="form-group md-form">
                        {{ Form::label('date_paid', 'Date Paid') }}
                        {{ Form::text('date_paid', null, array('class' => 'flatpickr')) }}
                    </div>
                    <div class="form-group md-form">
                        {{ Form::label('expected_delivery_date', 'Expected Delivery Date') }}
                        {{ Form::text('expected_delivery_date', null, array('class' => 'flatpickr')) }}
                    </div>

                </div>

                <div class="col-xs-12">
                    <div>
                        {{ Form::label('delivery_address', 'Delivery Address') }}
                        {{ Form::text('delivery_address', null, ['class' => '']) }}
                    </div>
                </div>

                <div class="col-xs-12 text-center">
                    {{ Form::submit('Update Order', ['class' => 'inputbutton btn btn-primary']) }}
                </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/materialize.min.js') !!}
    {!! Html::script('https://unpkg.com/flatpickr') !!}

    <script>

        //initialize materialize select
        $(document).ready(function() {
            $('select').material_select();
        });

        flatpickr(".flatpickr", {
            enableTime: true,
            enableSeconds: true,
            altInput: true,
        });

        $(document).ready(function($){
            $('#product_cat').on('change', function(e){
                var cat_id = e.target.value;
                $.get("{{ url('api/productdropdown') }}" + "?product_cat_id=" + cat_id, function(data) {
                    $('#product').empty();
                    $('#product').append("<option value=''>" + "Choose a Product" + "</option>");
                    $.each(data, function(index, product){
                        $('#product').append("<option value='" + product.id + "' data-price='" + product.price + "'>" + product.product_name + "</option>");
                    });
                });
            });

        });

        
        
    </script>

@endsection
