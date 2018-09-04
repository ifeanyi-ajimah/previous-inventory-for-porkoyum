@extends('main')

@section('title', '- Product Categories')

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
    </style>
@endsection


@section('content')

    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">

        <div class="row">
            <h4><strong>{{ $product_category->category_name }}</strong></h4>
            <hr/>
            @if($product_category->products->count() == 0)
                <h4>No Product added for this Category Yet</h4>
            @else
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <td>S/N</td>
                        <td>Product Name</td>
                        <td>Product Price</td>
                        <td colspan="2">Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($product_category->products as $product_category_product)
                            <tr>
                                <td>{{ $product_category_product->id }}</td>
                                <td>{{ $product_category_product->product_name }}</td>
                                <td>{{ $product_category_product->price }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('products.edit', $product_category_product->id) }}">View/Edit</a>
                                    <a class="btn btn-danger delete-product" href="#" url="{{ route('products.destroy', $product_category_product->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <br/>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">

                <h4>Add Products to <strong>{{ $product_category->category_name }}</strong> Category</h4>
                <hr/>

                {!! Form::open(['route' => ['products.store', $product_category->id], 'method' => 'POST', 'data-parsley-validate' => '']) !!}

                    <div class="form-group col-md-6">
                        {{ Form::label('product_name', 'Product Name') }}
                        {{ Form::text('product_name', null, ['class' => 'inputtext form-control']) }}
                    </div>

                    <div class="form-group col-md-6">
                        {{ Form::label('price', 'Price') }}
                        {{ Form::text('price', null, ['class' => 'inputtext form-control']) }}
                    </div>

                    {{ Form::submit('Add Product', ['class' => 'inputbutton btn btn-primary']) }}

                {!! form::close() !!}

            </div>
        </div>

        <br/>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">

                <h4>Edit {{ $product_category->category_name }}</h4>
                <hr/>

                {!! Form::model($product_category, ['route' => ['productcat.update', $product_category->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => 'true']) !!}

                    <div class="form-group">
                        {{ Form::label('category_name', 'Product Category Name') }}
                        {{ Form::text('category_name', null, ['class' => 'inputtext form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('image', 'Product Image') }}
                        {{ Form::file('image') }}
                    </div>

                     <div class="form-group">
                        {{ Form::label('dashboard_color', 'Product Category Color') }}
                        <select name="dashboard_color" class="" required>
                            <option>Select color</option>
                            <option value="info">blue</option>
                            <option value="danger">red</option>
                            <option value="success">green</option>
                            <option value="warning">yellow</option>
                        </select>
                    </div>

                    {{ Form::submit('Update Product Category', ['class' => 'inputbutton btn btn-primary']) }}

                {!! form::close() !!}

            </div>
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
        document.querySelectorAll('.delete-product').forEach(function(product){
            product.addEventListener('click', function(e){
                var url = this.getAttribute('url')
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'DELETE',
                    url: url,
                    error : function(response){
                        document.querySelector('body').innerHTML = response.responseText
                    }
                }).done(function(data) {
                    document.querySelector('#message').innerHTML = '<div class="alert alert-info center alert-dismissable '+
                            'error-list"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Product deleted successfully'+
                        '</div>'
                    setTimeout(function(){
                        this.parentElement.parentElement.remove()
                    }.bind(this), 500)
                    
                }.bind(this));
            })
        })
    </script>
@endsection