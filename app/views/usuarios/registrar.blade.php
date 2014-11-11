@section('modulo')
	<div class="row">
		<div class="push_three six columns registro">
			<div class="encabezado">
				Registrar nuevos usuarios
			</div>
			<div class="contenido"></div>
			<ul>
				<li class="field">
					{{
						Form::select('id_oficina',$oficinas,null,array('class' => 'input xxwide'));
					}}
				</li>
			</ul>
		</div>
	</div>
@stop