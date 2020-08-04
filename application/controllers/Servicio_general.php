<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Servicio_general extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
		
	public function index(){
		
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
		
		
		
		
		//Consulta - FOOTER-ALIANZAS
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'footer', "contenido_seccion" => 'alianzas' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanAlianzasDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['alianzasDB'] = $cleanAlianzasDB;
		
		
		
		
		//Consulta - servicios general
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'servicio', "contenido_seccion" => 'general' );
		
		$isServicio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isServicio) && count($isServicio) > 0) ? $isServicio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['serviciosDB'] = $valoresDB;
		
		
		
		
		
		
		
		
		$data['titulo'] = "Servicios | CI";
		$data['actual'] = "servicio_general";
		$data['desc'] = "Nuestros servicios | CI";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/servicio_general', $data);
		$this->load->view('public/footer', $data);
	}
	
	public function send(){
		
	}
		
		
	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('inicio'));
	}

	
}



