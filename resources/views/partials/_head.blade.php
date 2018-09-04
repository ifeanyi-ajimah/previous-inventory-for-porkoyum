<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="_token" content="{!! csrf_token() !!}">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Inventory @yield('title')</title>

<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>

<!-- Bootstrap -->
{{--{{ Html::style('css/bootstrap/bootstrap.css') }}--}}
{{ Html::style('css/bootstrap/bootstrap.min.css') }}
<link href="/css/app.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
{{--{{ Html::style('css/style.css') }}--}}
@yield('stylesheets')

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->