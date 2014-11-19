@section('modulo')
	<div class="row">
		<div class="push_three six columns registro">
			<div class="encabezado">
				Registrar nuevos usuarios
			</div>
			<div class="contenido">
				{{ Form::open(array('url' => 'registrar'))}}
				<ul>
					<li class="field">
						{{
							Form::select('id_oficina', $oficinas, null, array('class' => 'input xxwide'));
						}}
					</li>
					<li class="field">
						{{
							Form::select('id_rol', $roles, null, array('class'=>'input xxwide'));
						}}
					</li>
					<li class="field">
						{{
							Form::text('nombre', null, array(
								'class' => 'input xxwide',
								'placeholder' => 'Ingrese el nombre',
								'maxlength' => 30,
								'required' => 'true'));
						}}
					</li>					
					<li class="field">
						{{
							Form::text('apellido', null, array(
								'class' => 'input xxwide',
								'placeholder' => 'Ingrese el apellido',
								'maxlength' => 30,
								'required' => 'true'));
						}}
					</li>
					<li class="field">
						{{
							Form::email('email', null, array(
								'class' => 'input xxwide',
								'placeholder' => 'Ingrese el email',
								'maxlength' => 62,
								'required' => 'true'));
						}}
					</li>
					<li class="field">
						{{
							Form::password('password',array(
								'class' => 'input xxwide',
								'placeholder' => 'Ingrese el password',
								'maxlength' => 16,
								'required' => 'true'));
						}}
					</li>
					<li class="field">
						<div class="medium primary btn">
							{{
								Form::submit('Registrar');
							}}
						</div>
					</li>
				</ul>
				{{ Form::close()}}
			</div>
		</div>
	</div>
@stop