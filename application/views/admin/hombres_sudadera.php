<?php
//espacio para codigo PHP:

?>
<link href="<?php echo(base_url('assets/common/css/pick-a-color.min.css')) ?>" rel="stylesheet" type="text/css">
<!--
<script src="<?php echo(base_url('assets/common/js/librerias/tinycolor-0.9.15.min.js')) ?>"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/pick-a-color.js')) ?>"></script>
-->


<div class="container area_scroll" data-page="<?php echo($actual); ?>">
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		
		
		<?php $baseName = "sudadera_color"; $fotoName = "prenda"; ?>
		<div id="<?php echo($baseName); ?>_base" class="registro col3" data-cloneinfo="<?php echo($fotoName); ?>">
			<div class="valHead">
				<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
				<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
				<?php
					$data_input  =  array ( 
						'type' => 'hidden',
						'name' => '',
						'value' => @$v->decontrol,
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
						'data-conteovalfin' => "][decontrol]",
						'data-conteoval' => "name"
					);
				?>
				<?php echo form_input( $data_input ); ?>
			</div>
			
			<div class="box2col">
			<?php
				$valor = 'sudadera_color_name';
				$data_input  =  array ( 
					'name' => '',
					'value' => @$vDB->{$valor},
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<div>
				<label>Nombre del color:</label>
				<?php echo form_input( $data_input ); ?>
				</div>
			
			<?php
				$valor = 'sudadera_color_valor';
				$data_input  =  array ( 
					'name' => '',
					'value' => @$vDB->{$valor},
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<div>
				<label>Colocar color en Hexadecimal:</label>
				<?php echo form_input( $data_input ); ?>
				</div>
			</div>
				
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Prenda del color:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
		</div>
		
		
		
		
		<?php $baseName = "sudadera_estampados"; $fotoName = "portada"; $folder = "/hombres/sudadera/estampado"; ?>
		<div id="<?php echo($baseName); ?>_base" class="registro col3" data-cloneinfo="<?php echo($baseName); ?>">
			<div class="valHead">
				<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
				<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
				<?php
					$data_input  =  array ( 
						'type' => 'hidden',
						'name' => '',
						'value' => @$v->decontrol,
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
						'data-conteovalfin' => "][decontrol]",
						'data-conteoval' => "name"
					);
				?>
				<?php echo form_input( $data_input ); ?>
			</div>
			
			<?php
				$valor = 'sudadera_estampado_name';
				$data_input  =  array ( 
					'name' => '',
					'value' => @$vDB->{$valor},
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<label>Nombre de la colección:</label>
				<?php echo form_input( $data_input ); ?>
				
			
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Foto portada de la colección:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<div>
				<h3>Modelos:</h3>
			</div>
			<div class="box4col">
			<?php $fotoName = "model1"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen del modelo 1:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			<?php $fotoName = "model2"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen del modelo 2:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model3"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen del modelo 3:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model4"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen del modelo 4:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			</div>
			
			
			
			<div>
				<h3>Prendas de modelo:</h3>
			</div>
			<div class="box4col">
			<?php $fotoName = "model1p"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 1:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			<?php $fotoName = "model2p"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 2:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model3p"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 3:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model4p"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 4:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			</div>

			
		</div>
		
		
		
		
		



<!--
		<?php $baseName = "inicio"; $fotoName = "inicio"; ?>
		<div id="<?php echo($baseName); ?>_base" class="registro" data-cloneinfo="<?php echo($fotoName); ?>">
			<div class="valHead">
				<h5>Cultura <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo((int)$i+1); ?></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
				<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. --
				<?php
					$data_input  =  array ( 
						'type' => 'hidden',
						'name' => '',
						'value' => @$v->decontrol,
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
						'data-conteovalfin' => "][decontrol]",
						'data-conteoval' => "name"
					);
				?>
				<?php echo form_input( $data_input ); ?>
			</div>
			
			<?php
				$valor = 'titulo';
				$data_input  =  array ( 
					'name' => '',
					'value' => @$vDB->{$valor},
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<label>Titulo en texto:</label>
				<?php echo form_input( $data_input ); ?>
				
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen como titulo:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
				
			<?php
				$valor = 'titulo2';
				$data_input  =  array ( 
					'name' => '',
					'value' => @$vDB->{$valor},
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<label>Titulo 2:</label>
				<?php echo form_input( $data_input ); ?>
				
				
			<?php
				$valor = 'texto';
				$data_input  =  array ( 
					'name' => '',
					'value' => @$vDB->{$valor},
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<label>Texto:</label>
				<?php echo form_textarea( $data_input ); ?>
				
			
			<?php $fotoName = "portada"; ?>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen de Portada:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
					<?php
						echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
		</div>
		
		
		<div data-cloneinfo="<?php echo($fotoName);?>_imagen" date-noclone="true">
		<?php
			$data_input_hidden  =  array ( 
				'type' => 'hidden',
				'class' => 'conteo',
				'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
				'data-conteovalfin' => "][falso]",
				'data-conteoval' => "name"
			);
			$data_input =  array ( 
				'name' => '',
				'value' => '',
				'class' => 'validaciones vc form-control input-lg conteo',
				'autocomplete' => 'off',
				'placeholder' => '',
				'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
				'data-conteovalfin' => "",
				'data-conteoval' => "name"
			);
			echo form_input( $data_input_hidden );
			echo form_upload( $data_input );
		?>
		</div>
-->
				
	</div>
	
	
	
	
	
	
	
	


	
	<!-- 	Seccion de generales -->
	<?php $vDB = @$sudadera_generalDB; $baseName = "sudadera_general";?>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][baseName]" value="<?php echo($baseName); ?>"></input>
	
	<div id="<?php echo($baseName); ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Sudadera Generales:</h5>
				<hr class="colorgraph">
			</div>
			
			
			<div class="valueBox">
				<div class="">
					
					<?php
					if(isset($vDB)){
						?>
						<div class="registro col3">
							<div class="valHead">
							</div>
							
							<?php
								$valor = 'sudadera_tipo_corte';
								$data_input  =  array ( 
									'name' => 'sectores['.$baseName.'][txts]['.$valor.']',
									'value' => @$vDB->{$valor},
									'class' => 'validaciones vc form-control input-lg',
									'autocomplete' => 'off',
									'placeholder' => '',
									'data-conteovalin' => "sectores[$baseName][txts]",
									'data-conteovalfin' => "[$valor]",
									'data-conteoval' => "name"
								);
							?>				
								<label>Tipo de corte:</label>
								<?php echo form_input( $data_input ); ?>
								
								
<!--
							<?php
								$valor = 'sudadera_tipo_mangas';
								$data_input  =  array ( 
									'name' => 'sectores['.$baseName.'][txts]['.$valor.']',
									'value' => @$vDB->{$valor},
									'class' => 'validaciones vc form-control input-lg',
									'autocomplete' => 'off',
									'placeholder' => '',
									'data-conteovalin' => "sectores[$baseName][txts]",
									'data-conteovalfin' => "[$valor]",
									'data-conteoval' => "name"
								);
							?>				
								<label>Mangas:</label>
								<?php echo form_input( $data_input ); ?>
-->
								
								
								
							<?php
								$valor = 'sudadera_tipo_ubicacion';
								$data_input  =  array ( 
									'name' => 'sectores['.$baseName.'][txts]['.$valor.']',
									'value' => @$vDB->{$valor},
									'class' => 'validaciones vc form-control input-lg',
									'autocomplete' => 'off',
									'placeholder' => '',
									'data-conteovalin' => "sectores[$baseName][txts]",
									'data-conteovalfin' => "[$valor]",
									'data-conteoval' => "name"
								);
							?>				
								<label>Ubicacion:</label>
								<?php echo form_input( $data_input ); ?>
								
															
						</div>
						<?php
					}
					?>
					
				</div>
				
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	<!-- 	Seccion de sudadera -->
	<?php $vDB = @$sudadera_colorDB; $baseName = "sudadera_color"; $fotoName = "sombra"; $folder = "/hombres/sudadera/color"; ?>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][baseName]" value="<?php echo($baseName); ?>"></input>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgIndex]" value="prenda,sombra"></input>
	
	<div id="<?php echo($baseName); ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Sudadera Color:</h5>
				<hr class="colorgraph">
			</div>
			
			
			<div class="valueBox"><div>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
				
				<div class="boxRepeat activeCol">
					<div class="prendaSombra">
						<?php $fotoName = "sombra"; ?>
						<?php
							$data_input_hidden  =  array ( 
								'name' => "sectores[$baseName][imgs][$fotoName][falso]",
								'type' => 'hidden',
								'class' => 'conteo',
								'data-conteovalin' => "sectores[$baseName][imgs][$fotoName]",
								'data-conteovalfin' => "[falso]",
								'data-conteoval' => "name"
							);
							$data_input =  array ( 
								'name' => "sectores_".$baseName."_imgs_".$fotoName,
								'value' => '',
								'class' => 'validaciones vc form-control input-lg conteo',
								'autocomplete' => 'off',
								'placeholder' => '',
								'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName,
								'data-conteovalfin' => "",
								'data-conteoval' => "name"
							);
						?>
						<div class="bloque_imagen">
							<label>Sombra de prenda:</label>
							<div class="cleanBox">
							<?php
								if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
									$v = $vDB->imgs->{$fotoName};
									
									if($v !== ""){
										$data = [];
										$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
										$data['name'] = $v;
										$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][name]';
										$data['classAdd'] = 'conteo';
										$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][" data-conteovalfin="][name]" data-conteoval="name"';
										$this->load->view('admin/plantillas/img_block', $data);
									} else{
										echo form_input( $data_input_hidden );
										echo form_upload( $data_input );
									}
								} else{
									echo form_input( $data_input_hidden );
									echo form_upload( $data_input );
								}
							?>
							</div>
						</div>
					</div>
					
					<div class="boxMainClone gridPanel">Agregar un color de prenda: <div id="<?php echo($baseName); ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
				
					<?php $fotoName = "prenda"; ?>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
					<?php
					if(isset($vDB)){
						if(property_exists($vDB, $fotoName)){
							foreach ($vDB->{$fotoName}->clone as $i=>$v) {
								?>
								<div class="registro col3">
									<div class="valHead">
										<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo((int)$i+1); ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
										<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
										<?php
											$data_input  =  array ( 
												'type' => 'hidden',
												'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.'][decontrol]',
												'value' => @$v->decontrol,
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
												'data-conteovalfin' => "][decontrol]",
												'data-conteoval' => "name"
											);
										?>
										<?php echo form_input( $data_input ); ?>
									</div>
									
									<div class="box2col">
									<?php
										$valor = 'sudadera_color_name';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg pick-a-color form-control',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<div>
										<label>Nombre del color:</label>
										<?php echo form_input( $data_input ); ?>
										</div>
									<?php
										$valor = 'sudadera_color_valor';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg pick-a-color form-control',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<div>
										<label>Colocar color en Hexadecimal:</label>
										<?php echo form_input( $data_input ); ?>
										</div>
									</div>
										
									
										
									<div class="box2col">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Prenda del color:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
								</div>
								<?php
							}
						}
					}
					?>
					
				</div>
				
			</div></div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	<!-- 	Seccion de estampdos -->
	<?php $vDB = @$sudadera_estampadosDB; $baseName = "sudadera_estampados"; $fotoName = "portada"; $folder = "/hombres/sudadera/estampado"; ?>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][baseName]" value="<?php echo($baseName); ?>"></input>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgIndex]" value="portada,model1,model2,model3,model4,model1p,model2p,model3p,model4p"></input>
	
	<div id="<?php echo($baseName); ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Estampados:</h5>
				<hr class="colorgraph">
			</div>
			
			
			<div class="valueBox">
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un estampado: <div id="<?php echo($baseName); ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($vDB)){
						if(property_exists($vDB, $fotoName)){
							foreach ($vDB->{$fotoName}->clone as $i=>$v) {
								$fotoName = "portada";
								?>
								<div class="registro col3">
									<div class="valHead">
										<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo((int)$i+1); ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
										<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
										<?php
											$data_input  =  array ( 
												'type' => 'hidden',
												'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.'][decontrol]',
												'value' => @$v->decontrol,
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
												'data-conteovalfin' => "][decontrol]",
												'data-conteoval' => "name"
											);
										?>
										<?php echo form_input( $data_input ); ?>
									</div>
									
									<?php
										$valor = 'sudadera_estampado_name';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<label>Nombre de la coleccion:</label>
										<?php echo form_input( $data_input ); ?>
										
									
									
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Foto portada para la colección:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									
									<div>
										<h3>Modelos:</h3>
									</div>
									<div class="box4col">
										
									<?php $fotoName = "model1"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen del modelo 1:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model2"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen del modelo 2:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model3"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen del modelo 3:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													//print_r($vDB->imgs->{$fotoName}->{$num});
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													//isset($vDB->imgs->{$fotoName}[(int)$i])
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model4"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen del modelo 4:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									</div>
									
									
									<div>
										<h3>Prendas de modelo:</h3>
									</div>
									<div class="box4col">
										
									<?php $fotoName = "model1p"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 1:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model2p"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 2:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model3p"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 3:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													//print_r($vDB->imgs->{$fotoName}->{$num});
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													//isset($vDB->imgs->{$fotoName}[(int)$i])
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model4p"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 4:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									</div>
									
								</div>
								<?php
							}
						}
					}
					?>
					
				</div>
				
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
<!--
	<?php $vDB = @$inicioDB; $baseName = "inicio"; $fotoName = "inicio"; $folder = "/cultura"; ?>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][baseName]" value="<?php echo($baseName); ?>"></input>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgIndex]" value="inicio,portada"></input>
	
	<div id="<?php echo($baseName); ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Cultura:</h5>
				<hr class="colorgraph">
			</div>
			
			
			<div class="valueBox">
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un area de cultura: <div id="<?php echo($baseName); ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($vDB)){
						if(property_exists($vDB, $fotoName)){
							foreach ($vDB->{$fotoName}->clone as $i=>$v) {
								?>
								<div class="registro">
									<div class="valHead">
										<h5>Cultura <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo((int)$i+1); ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
										<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. --
										<?php
											$data_input  =  array ( 
												'type' => 'hidden',
												'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.'][decontrol]',
												'value' => @$v->decontrol,
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
												'data-conteovalfin' => "][decontrol]",
												'data-conteoval' => "name"
											);
										?>
										<?php echo form_input( $data_input ); ?>
									</div>
									
									<?php
										$valor = 'titulo';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<label>Titulo Texto:</label>
										<?php echo form_input( $data_input ); ?>
										
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen como titulo:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName}) && isset($vDB->imgs->{$fotoName}[(int)$i])){
													$data = [];
													$data['img'] = base_url('assets/public/img'.$folder.'/'.$vDB->imgs->{$fotoName}[(int)$i]);
													$data['name'] = $vDB->imgs->{$fotoName}[(int)$i];
													$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
													$data['classAdd'] = 'conteo';
													$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
													$this->load->view('admin/plantillas/img_block', $data);
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
										
									<?php
										$valor = 'titulo2';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<label>Titulo 2:</label>
										<?php echo form_input( $data_input ); ?>
										
									
									<?php
										$valor = 'texto';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<label>Texto:</label>
										<?php echo form_textarea( $data_input ); ?>
										
									
									<?php $fotoName = "portada"; ?>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen de portada:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName}) && isset($vDB->imgs->{$fotoName}[(int)$i])){
													$data = [];
													$data['img'] = base_url('assets/public/img'.$folder.'/'.$vDB->imgs->{$fotoName}[(int)$i]);
													$data['name'] = $vDB->imgs->{$fotoName}[(int)$i];
													$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
													$data['classAdd'] = 'conteo';
													$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
													$this->load->view('admin/plantillas/img_block', $data);
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
						}
					}
					?>
					
				</div>
				
			</div>
		</div>
	</div>	
-->
	

</form>