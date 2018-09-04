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
            <h3>Product Categories Management</h3>
            <hr/>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <td>S/N</td>
                    <td>Name</td>
                    <td colspan="2">Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($product_categories as $product_category)
                    <tr>
                        <td>{{ $product_category->id }}</td>
                        <td>{{ $product_category->category_name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('productcat.show', $product_category->id) }}">View/Edit</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['productcat.delete', $product_category->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">

                {!! Form::open(['route' => 'productcat.store', 'method' => 'POST', 'data-parsley-validate' => '', 'files' => 'true']) !!}

                    <div class="form-group">
                        {{ Form::label('category_name', 'Product Category Name') }}
                        {{ Form::text('category_name', null, ['class' => 'inputtext form-control', 'required' => '']) }}
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

                    <div class="form-group">
                        {{ Form::label('image', 'Product Image') }}
                        {{ Form::file('image') }}
                    </div>

                    {{--<div class="file-field input-field">--}}
                        {{--<div class="btn btn-success btn-lg">--}}
                            {{--<span>Product Image</span>--}}
                            {{--<input type="file">--}}
                        {{--</div>--}}
                        {{--<div class="file-path-wrapper">--}}
                            {{--<!-- <input class="file-path validate" type="text" required> -->--}}
                            {{--{{ Form::text('image', null, ['class' => 'file-path validate', 'required' => '', 'accept' => 'image/*']) }}--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{ Form::submit('Add Product Category', ['class' => 'inputbutton btn btn-primary']) }}

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