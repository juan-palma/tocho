<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Productos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('upload');
	}
	
	public $mainPage = 'home';
	public $mainPageName = 'Home';
	public $seccionesInternas = ['sudadera_general', 'sudadera_color', 'sudadera_estampados'];
	
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
		
/*
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
		$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'inicio' );
		
		$isInicio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isInicio) && count($isInicio) > 0) ? $isInicio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['inicioDB'] = $valoresDB;
		

		
		$data['titulo'] = "Home";
		$data['actual'] = "home";
		$data['desc'] = "Uniformes Deportivos";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/home', $data);
		$this->load->view('public/footer', $data);
*/
	}
	
	public function send(){
		
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
		
		
		$data['genero'] = "hombres";
		$data['area'] = $this->uri->segment(3, 0);
		$data['valorA'] = $this->uri->segment(4,0);
		
/*
		$data['titulo'] = $this->mainPageName;
		$data['actual'] = $this->mainPage;
*/
		$data['titulo'] = "Productos";
		$data['actual'] = "productos";
		$data['desc'] = "Productos | Uniformes Deportivos";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('public/head', $data);
		$this->load->view('public/productos', $data);
		//$this->load->view('admin/'.$this->mainPage, $data);
		$this->load->view('public/footer', $data);
/*
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
		
		
		
		
		$data['genero'] = "hombres";
		$data['area'] = $this->uri->segment(3, 0);
		$data['valorA'] = $this->uri->segment(4,0);
		
		$data['titulo'] = "Productos";
		$data['actual'] = "productos";
		$data['desc'] = "Productos | Uniformes Deportivos";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/productos', $data);
		$this->load->view('public/footer', $data);
*/
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
		
/*
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
		
		
		
		
		$data['genero'] = "mujeres";
		$data['area'] = $this->uri->segment(3, 0);
		$data['valorA'] = $this->uri->segment(4,0);
		
		$data['titulo'] = "Productos";
		$data['actual'] = "productos";
		$data['desc'] = "Productos | Uniformes Deportivos";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/productos', $data);
		$this->load->view('public/footer', $data);
*/
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
	
	
	
	
	
	
		
		
	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('inicio'));
	}

	
}



