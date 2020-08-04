<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Portafolios_general extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
	}
	
	public $varFlash = 'flashPortafoliosGeneral';
	public $success = [];
	public $error = [];
	
	public $status = [];
	public $valores = [];
	public $errores = [];
	
	public function index(){
		isNoLogged();
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';


		
		//Consulta - portafolios
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'portafolio', "contenido_seccion" => 'general' );
		
		$isPortafolio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isPortafolio) && count($isPortafolio) > 0) ? $isPortafolio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['portafoliosDB'] = $valoresDB;
		


		
		$data['titulo'] = "Portafolios";
		$data['actual'] = "portafolios_general";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('admin/head2', $data);
		$this->load->view('admin/saveControl', $data);
		$this->load->view('admin/portafolios_general', $data);
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
		
		// portafolios
		//::::::  Seccion para procesar informacion de portafolios :::::
		$this->valores['portafolio'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/img/portafolios';
		$config['allowed_types']	= 'gif|jpg|jpeg|png|svg';
		$config['max_size']			= 1024;
		$config['overwrite']		= true;
		
		$loadPortada = $this->loadFiles('base', 'fondo_titulo', ['null'], $config);
		
		if( isset($_POST['portafolios']['portafolio']) ){
			$loadPortaFoto = $this->loadFiles('portafolio', 'foto', $_POST['portafolios']['portafolio'], $config);
		} else{
			$loadPortaFoto = [];
		}
		


		if($loadPortaFoto !== false){
			//Datos de la seccion portafolios.
			$linea_portafolios = '{"titulo_general":"'.$_POST['portafolios']['titulo'].'", "fondo_titulo":"'.$loadPortada[0]['file_name'].'", "portafolios":[';
			
			if( isset($_POST['portafolios']['portafolio']) ){
				foreach ($_POST['portafolios']['portafolio'] as $i=>$v) {
					if($i !== 0){ $linea_portafolios .= ', '; }
					$linea_portafolios .= '{"foto":"'.@$loadPortaFoto[$i]['file_name'].'", "titulo_home":"'.$v['titulo_home'].'", "titulo_general":"'.$v['titulo_general'].'", "enlace":"'.url_title($v['enlace']).'"}';
				}
			}
			$linea_portafolios .= ']}';
			
			//consultar si existe un registro con valores para portafolios para saber si interta nuevo registro o actualizar el actual.
			//Consulta - portafolios
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'portafolio', "contenido_seccion" => 'general' );
			
			$isPortafolio = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($isPortafolio) > 0){
				//Consulta UPDATE portafolios
				$this->basic_modal->condicion = array('id_contenido', $isPortafolio[0]->id_contenido);
				$valores = array('contenido_info' => $linea_portafolios);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT portafolios
				$valores = array( 'contenido_info' => $linea_portafolios, 'contenido_pagina' => 'portafolio', 'contenido_seccion' => 'general', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
			}
		} else{
			$this->errores[] = 'No se cargaron todas las imágenes de la sección de portafolios.';
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



