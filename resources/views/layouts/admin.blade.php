<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
</head>
<body class="hold-transition skin-green-light fixed sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			@include('includes.headeradmin')
		</header>
		<div class="content-wrapper">
				@yield('content')
			<!-- /.container -->
		</div>
	</div>
	@include('includes.footeradmin')


<!-- ./wrapper -->
</body>

</html>
