@section('modulo')
	<div class="row">
		<div class="push_three six columns registro">
			<div class="encabezado">
				Validar usuarios
			</div>
			<div class="contenido">
				{{ Form::open() }}
					<ul>
						<li class="field">
							{{Form::email('email',null,array(
								'class'		=> 'input xxwide',
								'maxlength'	=> 62,
								'placeholder'	=> 'Ingrese el email',
								'required'		=> 'true'
							))}}
						</li>
						<li class="field">
							{{ Form::password('password',array(
								'class'		=> 'input xxwide',
								'maxlength'	=> 16,
								'placeholder'	=> 'Ingrese el password',
								'required'		=> 'true'
							))}}
						</li>
						<li>
							<div class="medium primary btn">
								{{
									Form::submit('Acceder');
								}}
							</div>
							<div class="medium secondary btn">
								<a href="{{ url('/registrar') }}">
									Registrate
								</a>
							</div>
						</li>
					</ul>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop