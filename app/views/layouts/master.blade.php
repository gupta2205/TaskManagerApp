<!doctype html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		{{ HTML::style('assets/css/mystyle.css') }}

	</head>
	<body>
		<div class="container">
			@yield('content')
		</div>

		{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
		{{ HTML::script('assets/js/myjs.js') }}

	</body>
</html>