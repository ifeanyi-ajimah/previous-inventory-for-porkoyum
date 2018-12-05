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
        .file-field{
            margin-top: 3.5rem;
        }
        .file-field .btn-success{
            background-color: #2ab27b;
            border-color: #259d6d;
        }
    </style>
@endsection


@section('content')

    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">

        <div class="row">
            <h3>Products </h3>
            <hr/>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <td>S/N</td>
                    <td>Product Name</td>
                    <td>Product Price</td>
                    <td> Description</td>
                    <td>Product Image</td>
                    <td colspan="2">Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id }}</td>
                        <td>{{$product->product_name }}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td><img style="max-height:60px; max-width:80px;" src="{{url('images', $product->image)}}"/></td>

                        
                        <td>
                            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                        </td>
                        <td>
                            <form id="delete-form-{{$product->id}}" method="post" action="{{route('products.destroy',$product->id)}}" style="display:none">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="" class="btn btn-primary" onclick="
                    if(confirm('Are you sure you want to delete? '))
                    {
                    event.preventDefault();
                    document.getElementById('delete-form-{{$product->id}}').submit();
                  }
                    else{
                    event.preventDefault();
                  }">
                  Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <h3>Add Products </h3>
                {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'data-parsley-validate' => '', 'files' => 'true']) !!}

                    <div class="form-group">
                        {{ Form::label('product_name', 'Product Category Name') }}
                        {{ Form::text('product_name', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('price', 'Product Price') }}
                        {{ Form::text('price', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('dashboard_color', 'Product Dashboard Color') }}
                        <select name="dashboard_color" class="" required>
                            <option disabled selected >Select color</option>
                            <option value="info">blue</option>
                            <option value="danger">red</option>
                            <option value="success">green</option>
                            <option value="warning">yellow</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('description', 'Product Description') }}
                        {{ Form::text('description', null, ['class' => 'inputtext form-control', 'required' => '']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('image', 'Product Image') }}
                        {{ Form::file('image') }}
                    </div>

                    

                    {{ Form::submit('Add New Product', ['class' => 'inputbutton btn btn-primary']) }}

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
    </script>
@endsection