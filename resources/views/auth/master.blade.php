<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Witaj, Zaloguj się</title>

	<link rel="icon" href="img/myApp-icon.png">
		
	<!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}">
		
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- FONTELLO ICON -->
	<link rel="stylesheet" href="http://cdnicon.net/i/cae4bb1d96d3301ecf5c640d852d745b/css/fontello.css">
	<link rel="stylesheet" href="http://cdnicon.net/i/cae4bb1d96d3301ecf5c640d852d745b/css/animation.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="http://cdnicon.net/i/cae4bb1d96d3301ecf5c640d852d745b/css/fontello-ie7.css">
	<![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

@yield('contents')

    <!-- Scripts -->
	<script src="{{ URL::asset('js/jquery.js') }}"></script>
	<script src="{{ URL::asset('js/bootstrap.js') }}"></script>
</body>
</html>
