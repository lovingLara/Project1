<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<title>@yield('name')</title>
	<link rel="shortcut icon" href="img/img1.jpg">
	<title>@yield('name')</title>
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/servant.css')}}
	{{HTML::style('css/nav.css')}}

	
</head>
<body>
		{{HTML::script('js/jquery.js')}}
		<div class="mod" id="login">
			<div class="mod-cont">	
				@yield('login')
			</div>
		</div>

		<div class="mod" id="reg">
			<div class="mod-cont">	
				@yield('reg')
			</div>
		</div>

		<div class="nav">
			@yield('nav')
		</div>
		
		<div class="errors">
			@yield('errors')
		</div>

		@yield('headlines')

		<!--Content-->
		<div class="content">
			@yield('content')
		</div>


		<!--Footer-->
		<div class="footer">
			@yield('footer')
		</div>	
</body>
</html>