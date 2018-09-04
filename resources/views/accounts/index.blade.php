@extends('main')

@section('title', '- Accounts')

@section('stylesheets')
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/fonts.css') !!}
    {!! Html::style('css/styles.css') !!}
    <style>
        .state-block, .state-block:hover {
            color: white;
            width: initial;
            border: 1px solid transparent;
            margin-bottom: 5px;
        }
        .state-block h3 {
            padding: 20px 5px;
            margin-top: 10px;
        }
        .state-block a, .state-block a:focus, .state-block a:hover, .nav-pills a, .nav-pills > li.active > a,
        .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
            color: #ffffff;
            outline: none;
        }
        .header h1{
            margin-top: 5px;
        }
        .state-block:first-child h3{
            margin-top: 0;
        }
        .state-block.active{
            border: 1.5px solid greenyellow;
        }
        .state-nav{
            height: auto;
            max-height: 90vh;
            overflow: auto;
        }
        .panel-group .panel{
            color: black;
            border-radius: 2px;
            margin: 10px 0;
        }
        .panel-footer button{
            font-weight: 100;
            letter-spacing: 1px;
            border-radius: 1.2px;
        }
        .h4.pull-right{
            letter-spacing: 0;
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }
        @media (min-width: 768px) {
            .state-nav{
                position: fixed;
            }
        }
    </style>
@endsection

{{--{!! Charts::assets() !!}--}}

@section('content')

<main class="row" id="app">
    <accounts></accounts>
</main>
@endsection