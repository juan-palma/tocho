var idagl = {};

//Seccion de VARIABLES: _____________________________________________________________________________________
idagl.elementos = {};







//Seccion de ATAJOS: _____________________________________________________________________________________
var id = idagl;
var el = id.elementos;







//Seccion de Funciones Globales: _____________________________________________________________________________________
//Funcion general de consultas externas.
function db_conectE(url, datos, f, e){
	new Request.JSON({
		method:'post',
		url:url,
		secure:false,
		onError:function(er){
			if(typeOf(e) === 'function'){ e(er); }
			console.warn(er);
			alert("Ocurrio un problema al guardar su informacion, intentelo mas tarde");
			
		},
		onFailure:function(xhr){
			if(typeOf(e) === 'function'){ f(xhr); }
			console.warn(xhr);
			alert("Ocurrio un problema al guardar su informacion, intentelo mas tarde");
			
		},
		onSuccess:function(j){
			if(j){
				if(j.status == 'ok'){
					if(typeOf(f) === 'function'){ f(j); }
				} else{
					if(typeOf(e) === 'function'){ e(j); }
					console.warn(j);
					alert("Ocurrio un problema al guardar su informacion, intentelo mas tarde");
				}
			} else{
				if(typeOf(e) === 'function'){ e(j); }
				console.warn(j);
				alert("Ocurrio un problema con su consulta, intentelo mas tarde");
			}
		}
	}).post('datos='+ JSON.encode(datos));
}




function db_conect(url, datos, f, e){
	// Set up the request.
	var xhr = new XMLHttpRequest();
	
	// Open the connection.
	xhr.open('POST', url, true);
	
	// Set up a handler for when the request finishes.
	xhr.onload = function () {
		var j = JSON.parse(xhr.response);
		
		if (xhr.status === 200) {
			if(j.status != 'ok'){
				console.info('Ocurrio un error al procesar tu informacion.');
				console.info(j);
				swal('', 'Ocurrio un error al procesar tu informacion, intentelo más tarde o póngase en contacto con su área de sistemas.', 'warning');
				e(j);
			} else{
				swal('', 'Se envio su mensaje con exito', 'success');
				f(j);
			}
		} else {
			console.info('Ocurrio un error con la coneccion.');
			console.info(j);
			swal('', 'Ocurrio un error con la coneccion., intentelo más tarde o póngase en contacto con su área de sistemas.', 'warning');
			e(j);
		}
	};
	
	xhr.onerror = function(){
		console.info('Ocurrio un error con la coneccion.');
		console.info(j);
		swal('', 'Ocurrio un error con la coneccion., intentelo más tarde o póngase en contacto con su área de sistemas.', 'warning');
		e(j);
	}
	
	// Send the Data.
	var consulta = xhr.send(datos);
}


function cleanBox(){
	gb.empty();
	gbc.empty();
}




function delReg(seccion){
	if(document.id('idRegistro') !== null){
		if(document.id('idRegistro').value !== ''){
			if(confirm('¿Esta seguro que desea borrar el registro actualmente cargado que se encuentra en pantalla?')){
				window.location.replace( baseDir + 'admin/' + seccion + '/delReg/' + document.id('idRegistro').value);
			}
		} else{
			alert('No ha cargado ningun registro que se pueda borrar');
		}
	}
	
}















function reconteo(seccion, extra){
	var valores = $$(seccion);
	
	valores.each(function(s, i){
		var textExtra = '';
		if(extra && typeOf(extra) === 'array'){
			extra.each(function(e){
				var texto = s.getElement(e);
				textExtra += ' ' + texto.value;
			});
		}
		
		var conteos = s.getElements('.conteo');
		conteos.each(function(c){
			switch(c.getProperty('data-conteoval')){
				case 'text':
					c.empty().set('text', c.getProperty('data-conteovalin') + (i+1) + ' ' + textExtra + c.getProperty('data-conteovalfin'));
				break;
				
				case 'name':
					c.name = c.getProperty('data-conteovalin') + i + c.getProperty('data-conteovalfin');
				break;
			}
		});
	});
}


//funcion para activar botones de borrado para images u otro proceso que se requira actiar desde un inicio.
function btnDelImg(seccion){
	if(confirm('¿Confirma borrar la imagen?')){
		var clone = $$('.hiden.boxClones [data-cloneinfo="'+this.idago.cloneType+'"]');
		this.empty();
		this.grab(clone[0].clone());
		
		reconteo('#'+seccion+' .registro', []);
	}
}

function activeImgBbox(seccion){
	//var secciones = $$('#'+seccion+' .registro .cleanBox');
	var secciones = $$('#'+seccion+' .cleanBox');
	secciones.each(function(s){
		var btnBorrar = s.getElements('.imgDel');
		btnBorrar.each(function(b){
			s.idago = {};
			s.idago.cloneType = s.getProperty('data-clonetype');
			b.addEvent('click', function(){
				btnDelImg.call(s, seccion);
			});
		});
	});
}

function removeInputIMG(bloque, cleanBox, clone, imagen, tipo, seccion, item, carpeta){
/*
	var box = bloque.getElement('.cleanBox[data-clonetype="'+clone+'"]');
	box.empty();
	
	var clone = $$('.hiden.boxClones > [data-cloneinfo="'+clone+'"]');
	clone = clone[0].clone();
	var img = clone.getElement('img');
	img.src = baseDir + 'assets/public/img/' + carpeta + '/' + imagen;
	var hiden = clone.getElement('input[type="hidden"]');
	hiden.value = imagen;
	hiden.setProperty('data-conteovalfin', '_'+tipo);
	hiden.setProperty('data-conteovalin', item);
	var nombre = clone.getElement('.name span');
	nombre.set('text', imagen);
	var btnDel = clone.getElement('.imgDel');
	
	box.idago = {};
	box.idago.cloneType = tipo;
		
	btnDel.addEvent('click', function(){
		btnDelImg.call(box, seccion);
	});
	
	box.grab(clone);
*/
}


// 	Funciones para activar los botones de clones de registros
function activar(copia, seccion, padre,  a){
	var btn_menos = copia.getElement(".menos");
	btn_menos.addEvent('click', function(){
		btnMenos.call(padre, seccion, a);
	});
	
	reconteo('#'+seccion+' .registro', a);
}

function btnMas(name, box, seccion, callBack){
	console.info(name);
	var clone = $$('.hiden.boxClones > [data-cloneinfo="'+name+'"]');
	clone = clone[0].clone();
	box.adopt([clone]);
	activar(clone, seccion, clone, callBack.a);
	
	if(callBack.f && typeOf(callBack.f) === 'function'){
		callBack.f(callBack.o, clone);
	}
}

function btnMenos(seccion, a){
	this.destroy();
	reconteo('#'+seccion+' .registro', a);
}



function addListItem(lista, item){
	lista.addItems(item);
}



function runListaReg(seccion){
	var btnLista = document.id('btnListaReg');
	var lista = document.id('listaRegistros');
	btnLista.addEvent('click', function(){
		window.location.href = baseDir+'admin/'+seccion+'/registro/' + lista.value;
	});
}

















// Pagina Home
function home_inicio(){
	
	//Desactivar el formulario para cobtrolar el envio
	document.id('formulario').addEvent('submit', function(e){
		e.preventDefault();
		e.stop();
		
		validar();
	});	
	
	
	
	//funciones para validar y enviar el formulario
	//validar
	function validar(){
		
		function fin(j){
			//remplazar los input por imagenes cargadas en SERVICIOS
			
			var contenedor = $$('#servicios');
			//remplazar los input por imagenes cargadas el fondo de los registros
/*
			if(j.valores.base.video_portada[0] !== 'nop' && j.valores.base.video_portada[0] !== ''){
				removeInputIMG(contenedor[0], '.video_portada.cleanBox', 'imgBlock', j.valores.base.video_portada[0],  'video_portada', 'servicios', 'base', 'servicios');
				var hiden = $$('.video_portada.cleanBox input[type="hidden"]');
				hiden[0].name = hiden[0].getProperty('data-conteovalin') + '0' + hiden[0].getProperty('data-conteovalfin');
			}
*/
			
			var secciones = $$('#servicios .registro');
			secciones.each(function(s, i){
				if(j.valores.servicio.icono[i] !== 'nop' && j.valores.servicio.icono[i] !== ''){
					removeInputIMG(s, '.servicio_icono .cleanBox', 'imgBlock', j.valores.servicio.icono[i],  'icono', 'servicios', 'servicio', 'servicios');
				}
/*
				if(j.valores.servicio.foto[i] !== 'nop' && j.valores.servicio.foto[i] !== ''){
					removeInputIMG(s, '.servicio_foto .cleanBox', 'imgBlock', j.valores.servicio.foto[i],  'foto', 'servicios', 'servicio', 'servicios');
				}
*/
			});
			reconteo('#servicios .registro', ['.servicio_titulo input']);
			
			
			//remplazar los input por imagenes cargadas en Portafolios
			var secciones = $$('#portafolio .registro');
			secciones.each(function(s, i){
				if(j.valores.portafolio.imagen[i] !== 'nop' && j.valores.portafolio.imagen[i] !== ''){
					removeInputIMG(s, '.portafolio_imagen .cleanBox', 'imgBlock', j.valores.portafolio.imagen[i],  'imagen', 'portafolios', 'portafolio', 'portafolios');
				}
/*
				if(j.valores.servicio.foto[i] !== 'nop' && j.valores.servicio.foto[i] !== ''){
					removeInputIMG(s, '.servicio_foto .cleanBox', 'imgBlock', j.valores.servicio.foto[i],  'foto', 'servicios', 'servicio', 'servicios');
				}
*/
			});
			reconteo('#portafolios .registro', ['.portafolio_nombre input']);
			
			
			//remplazar los input por imagenes cargadas en Clientes
			var secciones = $$('#clientes .registro');
			secciones.each(function(s, i){
				if(j.valores.cliente.logo[i] !== 'nop' && j.valores.cliente.logo[i] !== ''){
					removeInputIMG(s, '.cleanBox', 'imgBlock', j.valores.cliente.logo[i],  'logo', 'clientes', 'cliente', 'clientes');
				}
			});
			reconteo('#clientes .registro', []);
			
			
/*
			//remplazar los input por imagenes cargadas en Clientes
			var secciones = $$('#clientes .registro');
			secciones.each(function(s, i){
				if(j.valores.cliente.logo[i] !== 'nop' && j.valores.cliente.logo[i] !== ''){
					removeInputIMG(s, '.cleanBox', 'imgBlock', j.valores.cliente.logo[i],  'logo', 'clientes', 'cliente', 'clientes');
				}
			});
			reconteo('#clientes .registro', []);
			
			
			//remplazar los input por imagenes cargadas en Portafolios
			var secciones = $$('#portafolios .registro');
			secciones.each(function(s, i){
				if(j.valores.portafolio.fondo[i] !== 'nop' && j.valores.portafolio.fondo[i] !== ''){
					removeInputIMG(s, '.portafolio_fondo .cleanBox', 'imgBlock', j.valores.portafolio.fondo[i],  'fondo', 'portafolios', 'portafolio', 'portafolios');
				}
			});
			reconteo('#portafolios .registro', ['.portafolio_enlace input']);
			
			
			//remplazar los input por imagenes cargadas en Nosotros
			var secciones = $$('#nosotros .registro');
			secciones.each(function(s, i){
				if(j.valores.team.fondo[i] !== 'nop' && j.valores.team.fondo[i] !== ''){
					removeInputIMG(s, '.team_fondo .cleanBox', 'imgBlock', j.valores.team.fondo[i],  'fondo', 'nosotros', 'team', 'nosotros');
				}
			});
			reconteo('#nosotros .registro', ['.team_nombre input', '.team_apellido input']);
*/
		}
		
		function error(j){
			
		}
		
		var datos = new FormData(document.id('formulario'));
		db_conect(window.location.pathname+'/do_upload', datos, fin, error);
		
	}
	
	
	
	
	
// 	Codigo para iniciar la seccion SERVICIOS
	var listaNosotros = new Sortables('#servicios .boxDrag', {
		clone:true,
		onStart: function(e, c){
			c.addClass('cloneDrag');
		},
		onComplete: function(){
			//var padre = $$();
			reconteo('#servicios .registro', ['.servicio_titulo input']);
		}
	});
	var nosotrosAccordion = new Fx.Accordion($$('#servicios .boxDrag .boxShow'), $$('#servicios .boxDrag .boxHide'), {
	    display: -1,
	    alwaysHide: true,
	    keepOpen: true
	});
	
	activeImgBbox('servicios');
	document.id('servicio_clonemas').addEvent('click', function(){
		btnMas('formServicio', document.id('servicios').getElement('.boxRepeat'), 'servicios', {f:addListItem, o:listaNosotros, a:['.servicio_titulo input']} );
	});
	
	var allBTNDel = $$('#servicios .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'servicios', ['.servicio_titulo input']);
		});
	});
	
	
	
	
	
	
	
// 	Codigo para iniciar la seccion PORTAFOLIO
	var listaPortafolio = new Sortables('#portafolios .boxDrag', {
		clone:true,
		onStart: function(e, c){
			c.addClass('cloneDrag');
		},
		onComplete: function(){
			//var padre = $$();
			reconteo('#portafolios .registro', ['.portafolio_nombre input']);
		}
	});
	var portafolioAccordion = new Fx.Accordion($$('#portafolios .boxDrag .boxShow'), $$('#portafolios .boxDrag .boxHide'), {
	    display: -1,
	    alwaysHide: true,
	    keepOpen: true
	});
	
	activeImgBbox('portafolios');
	document.id('portafolios_clonemas').addEvent('click', function(){
		btnMas('formPortafolio', document.id('portafolios').getElement('.boxRepeat'), 'portafolios', {f:addListItem, o:listaNosotros, a:['.portafolio_nombre input']} );
	});
	
	var allBTNDel = $$('#portafolios .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'portafolios', ['.portafolio_nombre input']);
		});
	});	

	
	




// 	Codigo para iniciar la seccion CLIENTES	
	var listaClientes = new Sortables('#clientes .boxDrag', {
		clone:true,
		onStart: function(e, c){
			c.addClass('cloneDrag');
		},
		onComplete: function(){
			reconteo('#clientes .registro', []);
		}
	});
	
	activeImgBbox('clientes');
	document.id('clientes_clonemas').addEvent('click', function(){
		btnMas('logo', document.id('clientes').getElement('.boxRepeat'), 'clientes', {f:addListItem, o:listaClientes, a:[]});
	});
	
	var allBTNDel = $$('#clientes .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'clientes', []);
		});
	});
	
	
	
	
	
// 	Codigo para iniciar la seccion PORTAFOLIOS	
/*
	var listaPortafolios = new Sortables('#portafolios .boxDrag', {
		clone:true,
		onStart: function(e, c){
			c.addClass('cloneDrag');
		},
		onComplete: function(){
			reconteo('#portafolios .registro', ['.portafolio_enlace input']);
		}
	});
	var portafoliosAccordion = new Fx.Accordion($$('#portafolios .boxDrag .boxShow'), $$('#portafolios .boxDrag .boxHide'), {
	    display: -1,
	    alwaysHide: true,
	    keepOpen: true
	});
	
	activeImgBbox('portafolios');
	document.id('portafolios_clonemas').addEvent('click', function(){
		btnMas('formPortafolio', document.id('portafolios').getElement('.boxRepeat'), 'portafolios', {f:addListItem, o:listaPortafolios, a:['.portafolio_enlace input']});
	});
	
	var allBTNDel = $$('#portafolios .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'portafolios', ['.portafolio_enlace input']);
		});
	});
*/
	
	
	
	
	
// 	Codigo para iniciar la seccion NOSOTROS	
/*
	var listaPortafolios = new Sortables('#nosotros .boxDrag', {
		clone:true,
		onStart: function(e, c){
			c.addClass('cloneDrag');
		},
		onComplete: function(){
			reconteo('#nosotros .registro', ['.team_nombre input', '.team_apellido input']);
		}
	});
	var portafoliosAccordion = new Fx.Accordion($$('#nosotros .boxDrag .boxShow'), $$('#nosotros .boxDrag .boxHide'), {
	    display: -1,
	    alwaysHide: true,
	    keepOpen: true
	});
	
	activeImgBbox('nosotros');
	document.id('team_clonemas').addEvent('click', function(){
		btnMas('formNosotros', document.id('nosotros').getElement('.boxRepeat'), 'nosotros', {f:addListItem, o:listaPortafolios, a:['.team_nombre input', '.team_apellido input']});
	});
	
	var allBTNDel = $$('#nosotros .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'nosotros', ['.team_nombre input', '.team_apellido input']);
		});
	});
*/

	

}











// Pagina General
function general_inicio(){
	//Desactivar el formulario para cobtrolar el envio
	document.id('formulario').addEvent('submit', function(e){
		e.preventDefault();
		e.stop();
		
		validar();
	});	
	
	
	
	//funciones para validar y enviar el formulario
	//validar
	function validar(){
		
		function fin(j){
			//remplazar los input por imagenes cargadas en Nosotros
			var secciones = $$('#general .registro');
			secciones.each(function(s, i){
				if(j.valores.general.fondo[i] !== 'nop' && j.valores.general.fondo[i] !== ''){
					removeInputIMG(s, '.body_fondo .cleanBox', 'imgBlock', j.valores.general.fondo[i],  'fondo', 'general', 'general', 'general');
				}
			});
			reconteo('#nosotros .registro', []);
			
			
			
			
			//remplazar los input por imagenes cargadas en Alianzas
			var secciones = $$('#alianzas .registro');
			secciones.each(function(s, i){
				if(j.valores.alianza.logo[i] !== 'nop' && j.valores.alianza.logo[i] !== ''){
					removeInputIMG(s, '.cleanBox', 'imgBlock', j.valores.alianza.logo[i],  'logo', 'alianzas', 'alianza', 'alianzas');
				}
			});
			reconteo('#alianzas .registro', []);
			
			
		}
		
		function error(j){
			
		}
		
		var datos = new FormData(document.id('formulario'));
		db_conect(window.location.pathname+'/do_upload', datos, fin, error);
		
	}
	
	
	
	// 	Codigo para iniciar la seccion ALIANZAS	
	var listaAlianzas = new Sortables('#alianzas .boxDrag', {
		clone:true,
		onStart: function(e, c){
			c.addClass('cloneDrag');
		},
		onComplete: function(){
			reconteo('#alianzas .registro', []);
		}
	});
	
	activeImgBbox('alianzas');
	document.id('alianzas_clonemas').addEvent('click', function(){
		btnMas('logo', document.id('alianzas').getElement('.boxRepeat'), 'alianzas', {f:addListItem, o:listaAlianzas, a:[]});
	});
	
	var allBTNDel = $$('#alianzas .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'alianzas', []);
		});
	});

	
	
	
	
	
// 	Codigo para iniciar la seccion GENERAL	
	activeImgBbox('general');
}















// Pagina SOMOS
/*
function somos(){
	console.info('se ejecutoa servicio general');
	//Desactivar el formulario para cobtrolar el envio
	document.id('formulario').addEvent('submit', function(e){
		e.preventDefault();
		e.stop();
		
		validar();
	});	
	
	
	
	//funciones para validar y enviar el formulario
	//validar
	function validar(){
		
		function fin(j){
			//remplazar los input por imagenes cargadas en vacantes
			
			var contenedor = $$('#somos .contenedor');
			//remplazar los input por imagenes cargadas el fondo de los registros
			if(j.valores.base.fondo_titulo[0] !== 'nop' && j.valores.base.fondo_titulo[0] !== ''){
				removeInputIMG(contenedor[0], '.fondo_titulo.cleanBox', 'imgBlock', j.valores.base.fondo_titulo[0],  'fondo_titulo', 'servicio', 'base', 'servicios');
				var hiden = $$('.fondo_titulo.cleanBox input[type="hidden"]');
				hiden[0].name = hiden[0].getProperty('data-conteovalin') + '0' + hiden[0].getProperty('data-conteovalfin');
			}
			
			
/*
			var secciones = $$('#servicios_g .registro');
			secciones.each(function(s, i){
				if(j.valores.servicio.foto[i] !== 'nop' && j.valores.servicio.foto[i] !== ''){
					removeInputIMG(s, '.servicio_foto .cleanBox', 'imgBlock', j.valores.servicio.foto[i],  'foto', 'servicios', 'servicio', 'servicios');
				}
				if(j.valores.servicio.icono[i] !== 'nop' && j.valores.servicio.icono[i] !== ''){
					removeInputIMG(s, '.servicio_icono .cleanBox', 'imgBlock', j.valores.servicio.icono[i],  'icono', 'servicios', 'servicio', 'servicios');
				}
			});
			reconteo('#servicios_g .registro', []);
*
			
		}
		
		function error(j){
			
		}
		
		var datos = new FormData(document.id('formulario'));
		db_conect(window.location.pathname+'/do_upload', datos, fin, error);
		
	}
	
	
	
	
	
// 	Codigo para iniciar la seccion  servicio general
	activeImgBbox('galeriav');
	document.id('galeriav_clonemas').addEvent('click', function(){
		btnMas('fotov', document.id('galeriav').getElement('.boxRepeat'), 'galeriav', {});
	});
	document.id('galeriam_clonemas').addEvent('click', function(){
		btnMas('fotom', document.id('galeriam').getElement('.boxRepeat'), 'galeriam', {});
	});
	
	var allBTNDel = $$('#somos .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'somos');
		});
	});
	


}
*/















// Pagina Hombres
function hombres_sudadera_inicio(){
	//Desactivar el formulario para cobtrolar el envio
	document.id('formulario').addEvent('submit', function(e){
		e.preventDefault();
		e.stop();
		
		validar();
	});	
	
	//funciones para validar y enviar el formulario
	//validar
	function validar(){
		
		function fin(j){
			//remplazar los input por imagenes cargadas
			
/*
			if(j.valores.sudadera_color.prenda.length > 0){
				removeInputIMG(document.id('sudadera_color'), '.sombra', 'imgBlock', j.valores.sudadera_color.prenda[0],  'prenda', 'sudadera_color', 'base', 'hombres');
				var hiden = $$('.fondo_titulo.cleanBox input[type="hidden"]');
				hiden[0].name = hiden[0].getProperty('data-conteovalin') + '0' + hiden[0].getProperty('data-conteovalfin');
			}
*/
			
			
/*
			if(j.valores.base.prenda[0] !== 'nop' && j.valores.base.prenda[0] !== ''){
				removeInputIMG(contenedor[0], '.fondo_titulo.cleanBox', 'imgBlock', j.valores.base.prenda[0],  'prenda', 'sudadera_color', 'base', 'hombres');
				var hiden = $$('.fondo_titulo.cleanBox input[type="hidden"]');
				hiden[0].name = hiden[0].getProperty('data-conteovalin') + '0' + hiden[0].getProperty('data-conteovalfin');
			}
*/
						
		}
		
		function error(j){
			
		}
		
		var datos = new FormData(document.id('formulario'));
		db_conect(window.location.pathname+'/do_upload', datos, fin, error);
		
	}
	
	
	
	
	activeImgBbox('sudadera_color');
	document.id('sudadera_color_clonemas').addEvent('click', function(){
		btnMas('prenda', document.id('sudadera_color').getElement('.boxRepeat'), 'sudadera_color', {});
	});
	
	
	var allBTNDel = $$('#sudadera_color .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'sudadera_color');
		});
	});
	
	
	
/*
	activeImgBbox('inicio');
	document.id('inicio_clonemas').addEvent('click', function(){
		btnMas('inicio', document.id('inicio').getElement('.boxRepeat'), 'inicio', {});
	});
	
	
	var allBTNDel = $$('#inicio .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'inicio');
		});
	});
*/
	
	
	
	activeImgBbox('sudadera_estampados');
	document.id('sudadera_estampados_clonemas').addEvent('click', function(){
		btnMas('sudadera_estampados', document.id('sudadera_estampados').getElement('.boxRepeat'), 'sudadera_estampados', {});
	});
	
	var allBTNDel = $$('#sudadera_estampados .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'sudadera_estampados');
		});
	});
	
	
	
	
	
	
/*
	--------------------------------------------------------------
	::::: Para la vista de LATERAL :::::
	--------------------------------------------------------------
*/
	activeImgBbox('sudadera_lateral_color');
	document.id('sudadera_lateral_color_clonemas').addEvent('click', function(){
		btnMas('prenda_lateral', document.id('sudadera_lateral_color').getElement('.boxRepeat'), 'sudadera_lateral_color', {});
	});
	
	
	var allBTNDel = $$('#sudadera_lateral_color .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'sudadera_lateral_color');
		});
	});
	
	
	
	activeImgBbox('sudadera_lateral_estampados');
	document.id('sudadera_lateral_estampados_clonemas').addEvent('click', function(){
		btnMas('sudadera_lateral_estampados', document.id('sudadera_lateral_estampados').getElement('.boxRepeat'), 'sudadera_lateral_estampados', {});
	});
	
	var allBTNDel = $$('#sudadera_lateral_estampados .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'sudadera_lateral_estampados');
		});
	});
	
	
	
	



/*
	--------------------------------------------------------------
	::::: Para la vista de ESPALDA :::::
	--------------------------------------------------------------
*/
	activeImgBbox('sudadera_espalda_color');
	document.id('sudadera_espalda_color_clonemas').addEvent('click', function(){
		btnMas('prenda_espalda', document.id('sudadera_espalda_color').getElement('.boxRepeat'), 'sudadera_espalda_color', {});
	});
	
	
	var allBTNDel = $$('#sudadera_espalda_color .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'sudadera_espalda_color');
		});
	});
	
	
	
	activeImgBbox('sudadera_espalda_estampados');
	document.id('sudadera_espalda_estampados_clonemas').addEvent('click', function(){
		btnMas('sudadera_espalda_estampados', document.id('sudadera_espalda_estampados').getElement('.boxRepeat'), 'sudadera_espalda_estampados', {});
	});
	
	var allBTNDel = $$('#sudadera_espalda_estampados .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'sudadera_espalda_estampados');
		});
	});



	
}






















//--- Eventos a ejecutar cuando el DOM este listo _____________________________________________________________________________________
window.addEvent('domready', function(){
	if(typeof pageActual !== 'undefined'){
		if(pageActual !== ''){
			switch(pageActual){
				case 'home':
					home_inicio();
				break;
				
				case 'general':
					general_inicio();
				break;
				
				case 'hombres_sudadera':
					hombres_sudadera_inicio();
				break;
			}
		}
	}
	
});


//--- Eventos a ejecutar cuando la pagina este cargada _____________________________________________________________________________________
window.addEvent('load', function(){
	
});








