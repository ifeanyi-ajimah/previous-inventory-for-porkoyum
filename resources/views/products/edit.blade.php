@extends('main')

@section('title', '- Edit Product')


@section('stylesheets')
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}

     <style>
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
            font-size: 1rem;
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
        .md-form label.active{
            font-size: 1rem;
        }
        .select-wrapper span.caret{
            color: #f5f5f5;
        }
        footer{
            bottom: -345px !important;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">

            <h4>Edit Product - <strong>{{ $product->product_name }}</strong></h4>
            <hr/>

            {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'POST',  'data-parsley-validate' => '']) !!}
            {{ method_field('PUT') }}

                <div class="form-group col-md-6">
                    {{ Form::label('product_name', 'Product Name') }}
                    {{ Form::text('product_name', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                </div>

                <div class="form-group col-md-6">
                    {{ Form::label('price', 'Price') }}
                    {{ Form::text('price', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                </div>

                <div class="form-group col-md-6">
                        {{ Form::label('dashboard_color', 'Product Dashboard Color') }}
                        <select name="dashboard_color" class="" required>
                            <option disabled selected>Select color</option>
                            <option value="info">blue</option>
                            <option value="danger">red</option>
                            <option value="success">green</option>
                            <option value="warning">yellow</option>
                        </select>
                </div>


                <div class="form-group col-md-6">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::text('description', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                </div>

                <div class="form-group col-md-6">
                        {{ Form::label('image', 'Product Image') }}
                        {{ Form::file('image') }}
                </div>

                

                {{ Form::hidden('id', $product->id) }}

                <div class="form-group col-md-6">
                {{ Form::submit('Update Product', ['class' => 'inputbutton btn btn-primary']) }}
                </div>

            {!! form::close() !!}
            
            <br>
            <br>
            <br>
            <br>
            <br>
            <a href="{{route('products.index')}}" class="btn btn-primary">Back to Product List</a>
    </div>
</div>

@endsection


@section('scripts')
    {!! Html::script('js/materialize.min.js') !!}

    <script>
        //initialize materialize select
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@endsection