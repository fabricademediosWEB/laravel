<?php 
	class UsuariosModel extends Eloquent{

		protected $table = "usuarios";
		private $errors;

		private $reglasDeValidacion = array(
			'email' 	=> 'unique:usuarios|required',
			'nombre'	=> 'required|alpha',
			'apellido'	=> 'required|alpha',
			'password'	=> 'required|min:8'
		);

		private $mensajesDeValidacion = array(
			'email.unique'  	=> 'El correo ya esta registrado',
			'email.required'	=> 'El campo email es requerido',
			'nombre.alpha'		=> 'El nombre no debe contener caracteres especiales',
			'nombre.required'	=> 'El campo nombre es requerido',
			'apellido.alpha'	=> 'El apellido no debe contener caracteres especiales',
			'apellido.required'	=> 'El campo apellido es requerido',
			'password,required'	=> 'El campo password es requerido',
			'password.min'		=> 'El password debe componerse de minimo 8 caracteres'
		);

		function validator($data)
		{
			$validation = Validator::make($data, $this->reglasDeValidacion, $this->mensajesDeValidacion);

			if ($validation->fails()) {
					$this->errors = $validation->messages()->all();
					return false;
				} else {
					return true;
				}					
		}

		function showErrors()
		{
			return $this->errors;
		}
	}
 ?>
