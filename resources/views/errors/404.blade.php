
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Błąd 404 - myApp</title>
		
		<!-- Js -->
		<script src="{{ URL::asset('js/jquery.js') }}"></script>
		<script src="{{ URL::asset('js/bootstrap.js') }}"></script>
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}">

		<!-- My CSS -->
	    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
		
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<div class="container">
    <div class="jumbotron text-center">
        <h1>Error <small>404</small></h1>
        <p>Strony nie znaleziono!</p>
        
        <a href="/" type="button" class="btn btn-default btn-lg">Powrót</a>
    </div>
</div>
</body>