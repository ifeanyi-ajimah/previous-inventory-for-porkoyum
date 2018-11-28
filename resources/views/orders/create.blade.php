@extends('main')

@section('title', '- Create Order')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/toastr.min.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}
    {!! Html::style('css/selectize.css') !!}
    {!! Html::style('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') !!}

    <style>
        .inputbutton {
            margin-left: 15px;
        }

        .bottom_spacing {
            margin-bottom: 20px;
        }

        .select2 {
            border-radius: 0px;
            height: 50px;
        }

        .caret{
            border-color: transparent !important;
        }
        .datepicker table tr td.day.focused, .datepicker table tr td.day:hover,.datepicker .datepicker-switch:hover,
        .datepicker .next:hover, .datepicker .prev:hover, .datepicker tfoot tr th:hover {
            background: #286090;
            cursor: pointer;
        }
        .input-group.date{
            width: 100%;
        }
        .selector.form-control, input[type="text"]:not(.browser-default)[readonly="readonly"]{
            color: white;
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
            font-size: 1.2rem;
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
        .select-wrapper span.caret {
            color: #f5f5f5;
        }
        input[type="tel"]:not(.browser-default){
            font-size: 1.3rem;
        }
        .selectize-input, .selectize-input.full{
            box-shadow: none;
            border: none;
            border-radius: 0;
            background-color: transparent;
            color: white;
            border-bottom: 1px solid white;
            font-weight: 700;
        }

        .selectize-input,
        .selectize-control.single .selectize-input.input-active {
            display: inline-block;
            cursor: text;
            background: transparent;
        }
        .selectize-input input{
            color: white;
        }
        .modal{
            background-color: rgba(0,0,0,.5);
            max-height: 100%;
            width: 100%;
            padding-top: 2%;
        }

        .close {
            font-size: 30px;
        }
        .selectize-dropdown{
            /*font-weight: 700;*/
            font-size: 1.3rem;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        .select-wrapper.selectized{
            display: none;
        }
        .selectize-input{
            padding: 0px 8px;
        }
        .selectize-input.full{
            padding: 6px 8px;
        }

    </style>
@endsection


@section('content')

    <div class="row" id="app">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">

        <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                Create Item
                href="{{ url('customers/create') }}"
            </button> -->
            <h3>
                <span class="pull-left">Create Order</span>
                <button class="btn btn-success pull-right" data-toggle="modal" data-target="#create-item">New Customer ?</button>
            </h3>
            <hr/>
            <br/>

            {!! Form::open(['route' => 'orders.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        {{ Form::label('customer_id', 'Customer') }}
                        {{--{{ Form::number('customer_id', null, ['class' => 'inputtext form-control', 'id' => 'customerselect']) }}--}}
                        <select name="customer_id" class="selectpicker" data-show-subtext="true" data-live-search="true" id="customerselect" required placeholder="Select Customer">
                            <option>Select Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->phone_no }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" id="productDiv">
                        {{ Form::label('product_id', 'Product') }}
                        <select name="product_id" id="product" class="ct" required>
                            <option>Choose a Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" id="quantityDiv">
                        {{ Form::label('product_quantity', 'Quantity') }}
                        {{ Form::number('quantity', null, ['class' => 'inputtext form-control']) }}
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="form-group" id="valueDiv">
                        {{ Form::label('product_value', 'Value') }}
                        {{ Form::tel('value', null, ['class' => 'inputtext form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('state_id', 'Region') }}
                        <select name="state_id" class="ct" required placeholder="Region">
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--{{ Form::hidden('') }}--}}

                </div>

                <div class="col-md-12 bottom_spacing">
                    {{ Form::label('delivery_address', 'Delivery Address') }}
                    <input type="text" class="inputtext form-control" placeholder="Delivery Address" name="delivery_address" required id="delivery_address">
                </div>

                <div class="col-md-12 text-center">
                    {{ Form::submit('Create Order', ['class' => 'inputbutton btn btn-primary']) }}
                </div>

            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h2 class="modal-title text-center" id="myModalLabel" style="color: black; font-size: 20px;">New Customer</h2>
                </div>
                <div class="modal-body">
                    <h4 style="color: red;">All fields are REQUIRED!!!</h4>

                    <form data-toggle="validator" action="{{ route('custajax.store') }}" method="POST">
                        <div class="form-group">
                            <label class="control-label" for="title">Name</label>
                            <input type="text" name="name" class="form-control" data-error="Please enter name." required />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Address</label>
                            <input type="text" name="address" class="form-control" data-error="Please enter address." required />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Phone no</label>
                            <input type="text" name="phone_no" class="form-control" data-error="Please enter phone number." required />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="crud-submit btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{--<meta name="_token" content="{!! csrf_token() !!}" />--}}
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {{--{!! Html::script('js/select2.min.js') !!}--}}
    {!! Html::script('js/toastr.min.js') !!}
    {!! Html::script('js/materialize.min.js') !!}
    {!! Html::script('js/selectize.min.js') !!}
    {!! Html::script('https://cdn.jsdelivr.net/npm/flatpickr') !!}
    {{--<!--{!! Html::script('js/microplugin.js') !!} -->--}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        valueInput = $("#valueDiv input");
        quantityInput = $("#quantityDiv input");
        productInput = $('#productDiv select');
        //initialize materialize select
        $(document).ready(function() {
            $('.ct').material_select();
            // $('select').material_select();
            $('#customer_name').hide();
            $('#customer_phone').hide();

            $(".selector").flatpickr();
            valueInput.prop('readonly', 'readonly');
        });

        productInput.on('change', function () {
            changePrice();
        })

        quantityInput.on('change', function () {
            changePrice();
        })

        changePrice = function() {
            if (productInput.val()==1 && quantityInput.val()) {
                var sausagePrice = parseInt({{$products[0]->price}}) * parseInt(quantityInput.val());
                valueInput.val(sausagePrice);
            } else if (productInput.val()==2){
                var baconPrice = parseInt({{$products[1]->price}}) * parseInt(quantityInput.val());
                valueInput.val(baconPrice);
            }
        }

        $('.datepicker').on('changeDate', function(ev){
            $(this).datepicker('hide');
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(".crud-submit").click(function(e){

            e.preventDefault();

            var form_action = $("#create-item").find("form").attr("action");
            var name = $("#create-item").find("input[name='name']").val();
            var address = $("#create-item").find("input[name='address']").val();
            var phone_no = $("#create-item").find("input[name='phone_no']").val();

            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: form_action,
                data:{
                    name: name,
                    address: address,
                    phone_no: phone_no
                }
            }).done(function(data){
                var elem = document.createElement('option')
                $("#customerselect").append("<option value='"  + data.id + "' selected='true'>" + data.name +" - "+ data.phone_no + "</option>")
                $('.selectpicker').selectpicker('refresh');
                $("#delivery_address").val(data.address)
                $(".modal").hide();
                $(".modal-backdrop").hide();
                toastr.success('Customer Created Successfully.', 'Success Alert', { timeOut: 3000 });
                // $('select').material_select();
            }).fail(function(data){
                var errors = ''
                var obj = data.responseJSON.error
                for (var prop in obj) {
                    if (obj.hasOwnProperty(prop)) {
                        errors += obj[prop] + " "
                    }
                }
                toastr.warning(errors, 'Error', { timeOut: 5000 });
            })
        });

        $(document).ready(function($){
           // $('#customerselect').select2();
             /*$('#customerselect').selectize();*/

            $('#product_cat').on('change', function(e){
                console.log('Noted change')
                var cat_id = e.target.value;
                $.get("/api/productcategory/"+ cat_id+"/products", function(data) {
                    console.log(data)
                    $('#product').empty();
                    $('#product').append("<option value=''>" + "Choose a Product" + "</option>");
                    $.each(data, function(index, product){
                        console.log(index)
                        $('#product').append("<option value='" + product.id + "' data-price='" + product.price + "'>" + product.product_name + "</option>");
                    });
                    $('#product').material_select();
                });
            });

            $('#customerselect').on('change', function(e){
                $('#customer_name').hide();
                $('#customer_phone').hide();
                $.get("/api/customers/"+$(this).val(), function(data) {
                    $('#delivery_address').val(data.address)
                });
            });
        });


    </script>

@endsection
