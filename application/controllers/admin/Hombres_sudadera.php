<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Hombres_sudadera extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
	}
	
	public $mainPage = 'hombres_sudadera';
	public $mainPageName = 'Hombres_sudadera';
	public $seccionesInternas = ['sudadera_general', 'sudadera_color', 'sudadera_estampados'];
	
	public $varFlash = 'flashCultura';
	public $success = [];
	public $error = [];
	
	public $status = [];
	public $valores = [];
	public $errores = [];
	
	public function index(){
		isNoLogged();
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';		
		
		
		
		// Recorrido carga de datos
		$modulosRecorrido = $this->seccionesInternas;
		foreach($modulosRecorrido as $s){
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'contenido_info';
			$this->basic_modal->condicion = array( "contenido_pagina" => $this->mainPage, "contenido_seccion" => $s );
			
			$respuesta = $this->basic_modal->genericSelect('sistema');
			$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
			$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
			$cleanDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
			$data[$s.'DB'] = $cleanDB;
		}		
		
		
		
		$data['titulo'] = $this->mainPageName;
		$data['actual'] = $this->mainPage;
		$data['varFlash'] = $this->varFlash;
		$this->load->view('admin/head2', $data);
		$this->load->view('admin/saveControl', $data);
		$this->load->view('admin/'.$this->mainPage, $data);
		$this->load->view('admin/footer2', $data);
	}
	
			
		
	
	
	
	
	private function loadFilesAuto($c, $m, $s, $n){
		$folder = ( isset($c['folder']) && $c['folder'] !== "" ) ? $c['folder'] : "";
		$config['upload_path']		= FCPATH.'assets/public/img' . $folder;
		$config['allowed_types']	= ( isset($c['type']) && $c['type'] !== "" ) ? $c['type'] : 'gif|jpg|jpeg|png|svg|svg+xml';
		$config['max_size']			= ( isset($c['max']) && $c['max'] !== "" ) ? $c['max'] : 1024;
		$config['overwrite']		= ( isset($c['overwrite']) && $c['overwrite'] == "true" ) ? true : false;
		
		//$this->load->library('upload', $c);
		$this->upload->initialize($config);
		
		$todasCargaron = true;
		$rutaImagenes = [];
		$this->valores[$s][$n] = [];
		$f = 'sectores_'.$s.'_imgs_'.$n;
		

		//print_r($c);
		//echo("<br /><br /><br /><br />");
		if(isset($c['clone'])){
			//Funciones para recorrer los clones de la seccion
			foreach($c['clone'] as $i=>$cim){
				$fc = $f.'_clone'.$i;
				
				if( !isset($c['clone'][$i]['name']) ){
					if(isset($_FILES[$fc])){
						if($_FILES[$fc]['name'] !== "" && $_FILES[$fc]['error'] == 0){
							if ( ! $this->upload->do_upload($fc) ){
								$todasCargaron = false;
								$this->status = 'error';
								$this->errores[] =  $this->upload->display_errors();
								$rutaImagenes[$i] = '';
								$this->valores[$s]['imgs'][$n][$i] = '';
							} else{
								$result = $this->upload->data();
								$rutaImagenes[$i] = $result['file_name'];
								$this->valores[$s]['imgs'][$n][$i] = $result['file_name'];
							}
						}
					}
				} else{
					$rutaImagenes[$i] = $c['clone'][$i]['name'];
					$this->valores[$s]['imgs'][$n][$i] = $c['clone'][$i]['name'];
				}
			}
		} else{
			if( !isset($c['name']) ){
				if(isset($_FILES[$f])){
					if($_FILES[$f]['name'] !== "" && $_FILES[$f]['error'] == 0){
						if ( ! $this->upload->do_upload($f) ){
							$todasCargaron = false;
							$this->status = 'error';
							$this->errores[] =  $this->upload->display_errors();
							$rutaImagenes = '';
							$this->valores[$s]['imgs'][$n] = '';
						} else{
							$result = $this->upload->data();
							$rutaImagenes = $result['file_name'];
							$this->valores[$s]['imgs'][$n] = $result['file_name'];
						}
					}
				}
			} else{
				$rutaImagenes = $c['name'];
				$this->valores[$s]['imgs'][$n] = $c['name'];
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
		$pageMain = $_POST['pagina'];
		$this->valores['sectores'] = count($_POST['sectores']);
		
		foreach ($_POST['sectores'] as $sector) {
			$this->valores[$sector['baseName']] = [];
			//:::::: Procesar los valores de texto ::::::
			if(isset($sector['txts'])){
				$obj = (object) $sector['txts'];
				if(isset($obj->url)){
					$obj->url = url_title($obj->url);
				}
			} else{
				$obj = new stdClass;
			}
			
			$obj->imgs = (object)[];
			if( isset($sector['imgIndex']) ){
				$imgIndex_value = explode(",", $sector['imgIndex'] );
				foreach ($imgIndex_value as $i=>$imgIndex) {
					$carga = $this->loadFilesAuto($sector['imgs'][trim($imgIndex)], $pageMain, $sector['baseName'], trim($imgIndex));
					$obj->imgs->{trim($imgIndex)} = @$carga;
				}
			}
			
			$query = json_encode($obj);
			
			//consultar si existe un registro con valores para SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - HOME-SECCIONES
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => $pageMain, "contenido_seccion" => $sector['baseName'] );
			
			$existe = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($existe) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $existe[0]->id_contenido);
				$valores = array('contenido_info' => $query);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $query, 'contenido_pagina' => $pageMain, 'contenido_seccion' => $sector['baseName'], 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
			}

		}
				
		
		//Fin de la operación y retorno de la respuesta JSON a la consulta.
		echo( json_encode(['status' => $this->status, 'valores' => $this->valores, 'errores' => $this->errores]) );
		$this->cleanVar();
	}
	
	
	
	
	
	
	private function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('admin/'.$this->mainPage));
	}
	
	
	private function cleanVar(){
		$this->status = [];
		$this->valores = [];
		$this->errores = [];
	}
	
}



