<?php

class UsuariosController extends \BaseController {

	protected $layout = 'layouts.master';
	private $email;
	private $nombreCompleto;

	public function registrar(){
		
		$oficinas = DB::table('oficinas')->orderBy('oficina')->lists('oficina','id');
		$roles = DB::table('roles')->orderBy('rol')->lists('rol', 'id');

		$this->layout->notificacion = 'Modulo para registrar nuevos usuarios';
		$this->layout->modulo = View::make('usuarios.registrar', array('oficinas' => $oficinas,
																		'roles' => $roles));
	}
	public function registrar_bd(){
		/*DB::table('usuarios')->insert(array(
			'id_oficina' => Input::get('id_oficina'),
			'id_rol'     => Input::get('id_rol'),
			'id_estado'  => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'email'      => Input::get('email'),
			'password'   => md5(Input::get('password')),
			'nombre'	 => Input::get('nombre'),
			'apellido'	 => Input::get('apellido')
			));*/
		$usuarios = new UsuariosModel;

		$usuarios->id_oficina=Input::get('id_oficina');
		$usuarios->id_rol=Input::get('id_rol');
		$usuarios->id_estado=1;
		$usuarios->email=Input::get('email');
		$usuarios->password=md5(Input::get('password'));
		$usuarios->nombre=Input::get('nombre');
		$usuarios->apellido=Input::get('apellido');
		$usuarios->random=uniqid();

		$data = array(
			'email' => Input::get('email'),
			'password'   => Input::get('password'),
			'nombre'	 => Input::get('nombre'),
			'apellido'	 => Input::get('apellido')
		);

		if(!$usuarios->validator($data)){
			$this->layout->modelo = View::make('mensaje', array('encabezado' => 'Advertencia :', 'cuerpo' => $usuarios->showErrors()));
		}else{
			$usuarios->save();
			
			$datosUsuarios = $usuarios->find($usuarios->id);
			$this->nombreCompleto = $datosUsuarios->nombre.' '.$datosUsuarios->apellido;
			$this->email = $datosUsuarios->email;

			$data = array(
				'random' => $datosUsuarios->random
			);

			Mail::send('email',$data,function($message){
				$message->to($this->email,$this->nombreCompleto)->subject('Bienvenido');
			});

			$this->layout->notificacion = "Se ha enviado un correo electronico, para la activación de su cuenta";
		}
	}

	public function activar($random){
		UsuariosModel::where('random','=',$random)
		->update(array('id_estado' => 2));

		$this->layout->notificacion = "Cuenta Activada";
	}

	public function acceder(){
		$this->layout->notificacion = "Modulo de usuarios, validacion";
		$this->layout->modulo = View::make('usuarios.acceder');
	}

	public function validar()
	{
		$data = Input::all();

		//reglas validaciones
		$reglas = array(
			'email'		=> 'required',
			'password'	=> 'required|min:8'
		);

		$validation = validator::make($data,$reglas);

		if($validation->fails()){
			echo "Error de validacion";
		}else{
			$usuarios = new UsuariosModel;

			$email=Input::get('email');
			$password=Input::get('password');

			$datosUsuarioLogin = 
				$usuarios->
				where('email','=',$email)->
				where('password','=',md5($password))->first();

			if(!$datosUsuarioLogin){
				echo "Usuario no registrado";
			}else{
				if($datosUsuarioLogin->id_estado == 1) {
					echo "Es necesario que active la cuenta"; 
				}
				elseif ($datosUsuarioLogin->id_estado == 3) {
					echo "Su cuenta ha sido eliminada";
				}
				else{
					echo "Bienvenido al sistema de administración de usuarios"; 
				}
			}

		}
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
?>
