<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Admi user</title>
	{{HTML::style('css/gumby.css'); }}
	{{HTML::style('css/main.css');}}
	{{HTML::script('js/jquery.min.js')}}
	{{HTML::script('js/modernizr-2.6.2.min.js')}}
	{{HTML::script('js/gumby.js')}}
	{{HTML::script('js/gumby.toggleswitch.js')}}
	{{HTML::script('js/gumby.init.js')}}
	{{HTML::script('js/plugins.js')}}
</head>
<body>
	<header class="navbar" id="navegacion">
		<div class="items_navegacion">
			<a class="toggle" gumby-trigger="#navegacion > .
				items_mavegacion > ul" href="#">
				<i class="icon-menu"></i>
			</a>
			<ul style="float:right">
				<li>
					<a href="{{ url('/acceder ') }}">
						<span>Acceder</span>
						<i class="icon-key"></i>
					</a>
				</li>
				<li>
					<a href="{{url('/registrar')}}">
						<span>Registrar</span>
						<i class="icon-user-add" tittle="Features"></i>
					</a>
				</li>
			</ul>
		</div>			
	</header>
	<div class="notificaciones">
		<div class="row">
			<div class="twelve columns">
				{{$notificacion}}
			</div>
		</div>
	</div>
	@yield('modulo')
</body>
</html> 