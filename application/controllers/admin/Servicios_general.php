<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Servicios_general extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
	}
	
	public $varFlash = 'flashServiciosGeneral';
	public $success = [];
	public $error = [];
	
	public $status = [];
	public $valores = [];
	public $errores = [];
	
	public function index(){
		isNoLogged();
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';


		
		//Consulta - servicios
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'servicio', "contenido_seccion" => 'general' );
		
		$isServicios = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isServicios) && count($isServicios) > 0) ? $isServicios[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['serviciosDB'] = $valoresDB;
		


		
		$data['titulo'] = "Servicios";
		$data['actual'] = "servicios_general";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('admin/head2', $data);
		$this->load->view('admin/saveControl', $data);
		$this->load->view('admin/servicios_general', $data);
		$this->load->view('admin/footer2', $data);
	}
	
	
	
	private function loadFiles($s, $it, $a, $c){
		$this->upload->initialize($c);
		
		$todasCargaron = true;
		$rutaImagenes = [];
		$count = count($a);
		$this->valores[$s][$it] = [];
		
		for ($i = 0; $i < $count; $i++) {
			if( !isset($_POST[$s.$i.'_'.$it]) ){
				if(isset($_FILES[$s.$i.'_'.$it])){
					if($_FILES[$s.$i.'_'.$it]['name'] !== "" && $_FILES[$s.$i.'_'.$it]['error'] == 0){
						if ( ! $this->upload->do_upload($s.$i.'_'.$it) ){
							$todasCargaron = false;
							$this->status = 'error';
							$this->errores[] =  $this->upload->display_errors();
							$rutaImagenes[]['file_name'] = '';
							$this->valores[$s][$it][$i] = '';
						} else{
							$result = $this->upload->data();
							$rutaImagenes[] = $result;
							$this->valores[$s][$it][$i] = $result['file_name'];
						}
					} else{
						$rutaImagenes[]['file_name'] = '';
						$this->valores[$s][$it][$i] = '';
					}
				} else{
					$rutaImagenes[]['file_name'] = '';
					$this->valores[$s][$it][$i] = '';
				}
			} else{
				$rutaImagenes[]['file_name'] = $_POST[$s.$i.'_'.$it];
				$this->valores[$s][$it][$i] = 'nop';
			}
		}
		
		if($todasCargaron === true){
			return $rutaImagenes;
		} else{
			return false;
		}
	}
	
	
	
	
	public function do_upload(){
		$this->status = 'ok';
		
		// servicios
		//::::::  Seccion para procesar informacion de servicios :::::
		$this->valores['servicio'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/img/servicios';
		$config['allowed_types']	= 'gif|jpg|jpeg|png|svg|svgz';
		$config['max_size']			= 1024;
		$config['overwrite']		= true;
		
		$loadPortada = $this->loadFiles('base', 'fondo_titulo', ['null'], $config);
		
		if( isset($_POST['servicios']['servicio']) ){
			$loadPortaFoto = $this->loadFiles('servicio', 'foto', $_POST['servicios']['servicio'], $config);
			$loadIcono = $this->loadFiles('servicio', 'icono', $_POST['servicios']['servicio'], $config);
		} else{
			$loadPortaFoto = [];
			$loadIcono = [];
		}
		


		if($loadPortaFoto !== false && $loadIcono !== false){
			//Datos de la seccion servicios.
			$linea_servicios = '{"titulo_general":"'.$_POST['servicios']['titulo'].'", "fondo_titulo":"'.$loadPortada[0]['file_name'].'", "servicios":[';
			
			if( isset($_POST['servicios']['servicio']) ){
				foreach ($_POST['servicios']['servicio'] as $i=>$v) {
					if($i !== 0){ $linea_servicios .= ', '; }
					$linea_servicios .= '{"foto":"'.@$loadPortaFoto[$i]['file_name'].'","icono":"'.@$loadIcono[$i]['file_name'].'", "titulo":"'.$v['titulo'].'", "texto":"'.$v['texto'].'", "enlace":"'.url_title($v['enlace']).'"}';
				}
			}
			$linea_servicios .= ']}';
			
			//consultar si existe un registro con valores para servicios para saber si interta nuevo registro o actualizar el actual.
			//Consulta - servicios
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'servicio', "contenido_seccion" => 'general' );
			
			$isServicio = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($isServicio) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $isServicio[0]->id_contenido);
				$valores = array('contenido_info' => $linea_servicios);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $linea_servicios, 'contenido_pagina' => 'servicio', 'contenido_seccion' => 'general', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
			}
		} else{
			$this->errores[] = 'No se cargaron todas las imágenes de la sección de servicios generales.';
		}
		
		
		
		
		
		
		//Fin de la operación y retorno de la respuesta JSON a la consulta.
		echo( json_encode(['status' => $this->status, 'valores' => $this->valores, 'errores' => $this->errores]) );
		$this->cleanVar();
	}
	
	
	
	
	
	
	private function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('admin/home'));
	}
	
	
	private function cleanVar(){
		$this->status = [];
		$this->valores = [];
		$this->errores = [];
	}
	
}



