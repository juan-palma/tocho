<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Quienes_somos extends CI_Controller {
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
		
		
				
		
		
		//Consulta - Quienes Somos
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'somos', "contenido_seccion" => '' );
		
		$isInicio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isInicio) && count($isInicio) > 0) ? $isInicio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['somosDB'] = $valoresDB;
		
		
				
		$data['titulo'] = "Quienes Somos | CI";
		$data['actual'] = "somos";
		$data['desc'] = "Quienes Somos | CI";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/quienes_somos', $data);
		$this->load->view('public/footer', $data);
	}
	
				
	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('inicio'));
	}

	
}



