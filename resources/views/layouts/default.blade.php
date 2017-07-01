<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
</head>
<body class="hold-transition skin-green-light layout-top-nav">
	<div class="wrapper">
		<header class="main-header">
			@include('includes.header')
		</header>
		<div class="content-wrapper">
			<div class="container">
				@yield('content')
			</div>
			<!-- /.container -->
		</div>
		<footer class="main-footer">
			@include('includes.footer')
		</footer>
	</div>
<!-- ./wrapper -->
</body>
</html>