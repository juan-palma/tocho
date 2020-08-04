<div class="mainbox">
	<div id="totalOver">
		<form id="formPortaLogin" class="form-group">
			<input id="articuloP" name="articuloP" type="hidden" value="<?php echo($articulo); ?>"></input>
			<input id="rutaP" name="rutaP" type="hidden" value="<?php echo($ruta); ?>"></input>
			
			<h3 class="seRequierePass">Este portafolio requiere de una contraseña para visualizar.</h3>
			<label for="form-signin-password">Contraseña</label>
			<input class="form-control" id="form-login-password" name="password" placeholder="Password" required="required" type="password" autocomplete="off" value="">
			<input type="submit"></input>
		</form>
	</div>
</div>