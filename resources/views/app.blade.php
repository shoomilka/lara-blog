<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My blog</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">My blog</a>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/moment.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap-formhelpers.js"></script>
	<script type="text/javascript" src="/js/bootstrap-datetimepicker.js"></script>
	
	<script type="text/javascript">
		$(function () {
            $('#datetimepicker').datetimepicker({
                 format: 'YYYY-MM-DD HH:mm:ss'
            });
        });
    </script>
</body>
</html>
