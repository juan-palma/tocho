<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Productos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('upload');
	}
	
	public $mainPage = 'home';
	public $mainPageName = 'Home';
	public $seccionesInternas = ['base', 'color', 'estampados','lateral_color', 'lateral_estampados','espalda_color', 'espalda_estampados'];
	
	public $varFlash = 'flashCultura';
	public $success = [];
	public $error = [];
	
	public $status = [];
	public $valores = [];
	public $errores = [];
	
	
		
	public function index(){
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';		
		
		
		
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'general' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['generalDB'] = $cleanObjecDB;
		
		
		
		//Consulta - HOME-INICIO
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'inicio' );
		
		$isInicio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isInicio) && count($isInicio) > 0) ? $isInicio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['inicioDB'] = $valoresDB;
		
				
		
		$data['titulo'] = $this->mainPageName;
		$data['actual'] = $this->mainPage;
		$data['varFlash'] = $this->varFlash;
		$this->load->view('public/head', $data);
		$this->load->view('public/home', $data);
		//$this->load->view('admin/'.$this->mainPage, $data);
		$this->load->view('public/footer', $data);
		
	}
	
	
	
	
	
	
	
	
	
	public function hombres(){
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';		
		
		
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'general' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['generalDB'] = $cleanObjecDB;
		
		
		
		//Consulta - HOME-INICIO
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'inicio' );
		
		$isInicio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isInicio) && count($isInicio) > 0) ? $isInicio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['inicioDB'] = $valoresDB;
		
		
		
		// Recorrido carga de datos
		$actualMainPage = "hombres_".$this->uri->segment(4,0);
		$modulosRecorrido = $this->seccionesInternas;
		foreach($modulosRecorrido as $s){
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'contenido_info';
			$this->basic_modal->condicion = array( "contenido_pagina" => $actualMainPage, "contenido_seccion" => $s );
			
			$respuesta = $this->basic_modal->genericSelect('sistema');
			$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
			$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
			$cleanDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
			$data[$s.'DB'] = $cleanDB;
		}		
		
		
		//$data['genero'] = "hombres";
		$data['genero'] = $this->uri->segment(2, 0);
		$data['area'] = $this->uri->segment(3, 0);
		$data['valorA'] = $this->uri->segment(4,0);
		
		
		if($data['area'] !== 0 && $data['valorA'] !== 0){
			if($data['area'] !== 'basico'){
				if(!isNoLoggedCustom() || !isLoggedNoDataCustom() ){
					redirect(base_url('productos/'.$data['genero']."/".$data['area']));
				} else{
					$carga = "public/productos_".$data['area']."_$actualMainPage";
				}
			} else{
				$carga = "public/productos_".$data['area']."_$actualMainPage";
			}
				
		} else if($data['area'] !== 0){
			if($data['area'] !== 'basico'){
				if(!isNoLoggedCustom()){
					$carga = "public/productos_".$data['area']."_login";
				} else if(!isLoggedNoDataCustom()){
					$carga = "public/productos_".$data['area']."_login";
				} else{
					//$carga = "public/productos_".$data['area'];
					$carga = "public/productos_".$data['area']."_elegir";
				};
			} else{
				$carga = "public/productos_".$data['area'];
			}
		} else{
			$carga = "public/productos";
		}
		
		$data['titulo'] = "Productos";
		$data['actual'] = "productos";
		$data['desc'] = "Productos | Uniformes Deportivos";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('public/head', $data);
		$this->load->view($carga, $data);
		//$this->load->view('admin/'.$this->mainPage, $data);
		$this->load->view('public/footer', $data);
		
	}
	
	
	
	
	
	
	
	
	public function mujeres(){
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';		
		
		
		
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'general' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['generalDB'] = $cleanObjecDB;
		
		
		
		//Consulta - HOME-INICIO
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'inicio' );
		
		$isInicio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isInicio) && count($isInicio) > 0) ? $isInicio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['inicioDB'] = $valoresDB;
		
		
		
		// Recorrido carga de datos
		$actualMainPage = "mujeres_".$this->uri->segment(4,0);
		$modulosRecorrido = $this->seccionesInternas;
		foreach($modulosRecorrido as $s){
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'contenido_info';
			$this->basic_modal->condicion = array( "contenido_pagina" => $actualMainPage, "contenido_seccion" => $s );
			
			$respuesta = $this->basic_modal->genericSelect('sistema');
			$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
			$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
			$cleanDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
			$data[$s.'DB'] = $cleanDB;
		}		
		
		
		$data['genero'] = "mujeres";
		$data['area'] = $this->uri->segment(3, 0);
		$data['valorA'] = $this->uri->segment(4,0);
		
		$data['titulo'] = $this->mainPageName;
		$data['actual'] = $this->mainPage;
		$data['desc'] = "Productos | Uniformes Deportivos";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('public/head', $data);
		$this->load->view('public/productos', $data);
		//$this->load->view('admin/'.$this->mainPage, $data);
		$this->load->view('public/footer', $data);
		
	}
	
	
	
	
	
	
	
	
	
	public function ninos(){
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';
		
		
		
		//Consulta - GENERAL
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'general' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['generalDB'] = $cleanObjecDB;
		
		
		
		//Consulta - HOME-INICIO
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'productos', "contenido_seccion" => 'inicio' );
		
		$isInicio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isInicio) && count($isInicio) > 0) ? $isInicio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['productosDB'] = $valoresDB;
		
		
		
		
		$data['genero'] = "ninos";
		$data['area'] = $this->uri->segment(3, 0);
		$data['valorA'] = $this->uri->segment(4,0);
		
		$data['titulo'] = "Productos";
		$data['actual'] = "productos";
		$data['desc'] = "Productos | Uniformes Deportivos";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/productos', $data);
		$this->load->view('public/footer', $data);
	}
	
	
	
	
	
	
	
	
	
	
	
	public function send(){
		
	}
	
	
	
	
	
	
	
	
	public function login(){
		$procesoValido = true;
		$this->session->userAlerts = "";
		
		if(isset($_POST['correo'])){
			$userMail = $_POST['correo'];
		} else if($this->session->userMail !== ''){
			$userMail = $this->session->userMail;
		} else{
			$userMail = "";
		}
		
		$userMail = filter_var(filter_var($userMail, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
		if($userMail){
			$this->session->userMailTemp = $userMail;
		} else{
			$this->session->userAlerts .= "El correo no es valido \n\r";
			$procesoValido = false;
		}
		$userEquipo = $_POST['equipo'];
		$userEquipo = filter_var($userEquipo, FILTER_SANITIZE_STRING);
		if($userEquipo !== ''){
			$this->session->userEquipoTemp = $userEquipo;
		} else{
			$this->session->userAlerts .= "El texto no es valido o tiene caracteres no permitidos \n\r";
			$procesoValido = false;
		}
		$userLiga = $_POST['liga'];
		$userLiga = filter_var($userLiga, FILTER_SANITIZE_STRING);
		if($userLiga !== ''){
			$this->session->userLigaTemp = $userLiga;
		} else{
			$this->session->userAlerts .= "El texto no es valido o tiene caracteres no permitidos \n\r";
			$procesoValido = false;
		}
		
		if(!$procesoValido){
			redirect(base_url($this->session->urlPeticion));
		} else{
			//Consulta - usuarios - registro existente
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'usuarios';
			$this->basic_modal->campos = 'id_user';
			$this->basic_modal->condicion = array( "u_mail" => $userMail );
			//$this->basic_modal->condicion = array( "contenido_pagina" => $pageMain, "contenido_seccion" => $sector['baseName'] );
			
			$usuarioDB = $this->basic_modal->genericSelect('sistema');
			if(count($usuarioDB) > 0){
				$this->session->idUser = $usuarioDB[0]->id_user;
				$this->session->userMail = $userMail;
				$this->session->userEquipo = $userEquipo;
				$this->session->userLiga = $userLiga;
			} else{
				//Insertar los valores en la base de datos
				//Usuario
				$this->basic_modal->clean();
				$this->basic_modal->tabla = 'usuarios';
				$valores = array( 'u_mail' => $userMail);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
				if($insert){
					$this->session->idUser = $insert;
					$this->session->userMail = $userMail;
					$this->session->userEquipo = $userEquipo;
					$this->session->userLiga = $userLiga;
				}
			}
			
			unset(
				$_SESSION['userMailTemp'],
				$_SESSION['userEquipoTemp'],
				$_SESSION['userLigaTemp']
			);
			$this->session->userAlerts = "";
			redirect(base_url($this->session->urlPeticion));
		}
		
		
		
	}
	
	
	
	
	
	
		
		
	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('inicio'));
	}

	
}



