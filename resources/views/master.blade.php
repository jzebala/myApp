<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>myApp - @yield('title')</title>

		<link rel="icon" href="img/myApp.png">
		
		<!-- Js -->
		<script src="{{ URL::asset('js/jquery.js') }}"></script>
		<script src="{{ URL::asset('js/bootstrap.js') }}"></script>
		<script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>

		@yield('tinymce')
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap/bootstrap-datetimepicker.min.css') }}">

		<!-- My CSS -->
	    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
		
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
<body>

@include('nav')

<!-- CONTENTS -->
<div class="container">
    @yield('contents')
</div>
<!-- END CONTENTS -->

	@include('footer')

<script>
	tinymce.init({
	selector: 'textarea',
	language: 'pl'
	});
</script>
</body>
</html>