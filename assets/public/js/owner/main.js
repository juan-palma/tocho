var idagl = {};

//Seccion de VARIABLES: _____________________________________________________________________________________
idagl.elementos = {};
idagl.recaptcha = "incorrecto";






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
				if(j.status != 'personal'){
					e(j);
				} else{
					console.info('Ocurrio un error al procesar tu informacion.');
					console.info(j);
					swal('', 'Ocurrio un error al procesar tu informacion, intentelo más tarde o póngase en contacto con su área de sistemas.', 'warning');
					e(j);
				}
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



function db_conect2(url, datos, f, e){
	// Set up the request.
	var xhr = new XMLHttpRequest();
	
	// Open the connection.
	xhr.open('POST', url, true);
	
	// Set up a handler for when the request finishes.
	xhr.onload = function () {
		var j = JSON.parse(xhr.response);
		
		if (xhr.status === 200) {
			if(j.status != 'ok'){
				if(j.status != 'personal'){
					e(j);
				} else{
					console.info('Ocurrio un error al procesar tu informacion.');
					console.info(j);
					swal('', 'Ocurrio un error al procesar tu informacion, intentelo más tarde o póngase en contacto con su área de sistemas.', 'warning');
					e(j);
				}
			} else{
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







function requestDownload(url){
    var request = new XMLHttpRequest();
    request.open('POST', url, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.responseType = 'blob';

    request.onload = function() {
      // Only handle status code 200
      if(request.status === 200) {
        // Try to find out the filename from the content disposition `filename` value
        var disposition = request.getResponseHeader('content-disposition');
        var matches = /"([^"]*)"/.exec(disposition);
        var filename = (matches != null && matches[1] ? matches[1] : 'inmotion.vcf');

        // The actual download
        var blob = new Blob([request.response], { type: 'text/x-vcard' });
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = filename;

        document.body.appendChild(link);

        link.click();

        document.body.removeChild(link);
      }
      
    };

    request.send('content=' + 'nada');
}







// habilitar boton pausa y control de video Backgroudn
/*
function videoControl(){
	var padre = document.id('primaryContainer');
	if(padre.getElement('.video .iframe-container')){
	
		var box = padre.getElement('.video');
		
		var iframe = box.getElement('iframe');
	    var player = new Vimeo.Player(iframe);
	    
	    var playBtn = document.querySelector('.btnPlay');
	    var centro = document.querySelector('.centro');
	    var frameBox = document.querySelector('.iframe-container');
	    
	    function onPlay(){
		    console.info('en play');
		    frameBox.removeClass('stopfade');
		    centro.addclass('op0').addClass('dnone');
	    }
	    player.on('play', onPlay);
	    
	    function onPause(){
		    frameBox.removeClass('dnone').addClass('stopfade');
		    centro.removeClass('dnone').removeClass('op0');
	    }
	    player.on('pause', onPause);
	    player.on('ended', onPause);
	    
	    playBtn.addEvent('click', function(){
		    player.play();
		    
		    frameBox.removeClass('stopfade');
		    centro.addClass('op0').addClass('dnone');
	    });
    
    }

}
*/
/*
function videoControl(video, btnPlay, btPausa){
	var vid = document.getElementById(video);
	var playBtn = document.querySelector(btnPlay);
	//var pauseBtn = document.querySelector(btPausa);
	
	if (window.matchMedia('(prefers-reduced-motion)').matches) {
		vid.removeAttribute("autoplay");
		vid.pause();
		playBtn.removeClass('dnone').removeClass('op0');
		pauseBtn.addClass('dnone').addClass('op0');
		//pauseBtn.innerHTML = "Paused";
	}
	
	function vidFade() {
		vid.classList.add("stopfade");
	}
	
	vid.addEventListener('ended', function(){
		// only functional if "loop" is removed 
		vid.pause();
		// to capture IE10
		vidFade();
	});
	
	
	function vidAction(){
		vid.classList.toggle("stopfade");
		if (vid.paused) {
			vid.play();
			playBtn.addClass('op0');
			(function(){
				playBtn.addClass('dnone');
			}).delay(100);
			pauseBtn.removeClass('dnone').removeClass('op0');
		} else {
			vid.pause();
			pauseBtn.addClass('op0');
			(function(){
				pauseBtn.addClass('dnone');
			}).delay(100);
			playBtn.removeClass('dnone').removeClass('op0');
		}
	}
	
	
	playBtn.addEventListener("click", vidAction);
	pauseBtn.addEventListener("click", vidAction);
}
*/
	






function descargar_vcard(){
	requestDownload(baseDir+'ajax/downloadVcard');
}











function header_run(){
	
	var boxBtn = document.id('navMobileOpen');
	var btnMovile = boxBtn.getElement('img');
	btnMovile.addEvent('click', function(){
		document.id('navExtend').addClass('active');
	});
	
	
	var boxBtnClose = document.id('navMobileClose');
	var btnMovileClose = boxBtnClose.getElement('img');
	btnMovileClose.addEvent('click', function(){
		document.id('navExtend').removeClass('active');
	});
	
	
	//desplegable del menu mobile para postulate
	var myAccordion = new Fx.Accordion($$('.postulateAcordeon'), $$('.postulateInfo'), {
		display: 2,
		alwaysHide: true
	});
	
	
	var scrollFX = new Fx.Scroll(window, {
	    offset: {
	        x: 0,
	        y: 0
	    }
	});
	
	document.id('btnMenuCliente').addEvent('click', function(){
		scrollFX.toElement(document.id('clientes'), 'y');
	});
}















//--- Seccion de FUNCIONES: _____________________________________________________________________________________

//::::::::::::::::::::::::
// ***** HOME *****//
function home_inicio(){
/*
	var slider = tns({
		container: '#clientes .slideItems',
		items: 2,
		axis:'vertical',
		nav:false,
		speed: 300,
		prevButton:'#clientes .slideMain .btnSlideBack',
		nextButton:'#clientes .slideMain .btnSlideNext',
		//"autoplay": true,
		//"autoplayHoverPause": false,
		//"autoplayTimeout": 3500,
		//"autoplayText": [ "▶", "❚❚" ],
		//"swipeAngle": false,
		responsive: {
			780: {
				items: 2
			}
		}
	});
*/
	
/*
	var sliderPortafolio = tns({
		container: '#portafolios .slideItems',
		items: 1,
		nav:false,
		speed: 300,
		//prevButton:'#portafolios .slideMain .btnSlideBack',
		//nextButton:'#portafolios .slideMain .btnSlideNext',
		responsive: {
			568: {
				items: 1
			},
			1023: {
				items: 1
			},
			1200: {
				items: 1
			},
			1400: {
				items: 1
			}
		}
	});
*/
	
	
	
	var sliderPortafolio = tns({
		"container": '#portafolios .slideItems',
		//"autoHeight": true,
		"items": 1,
		"swipeAngle": false,
		"speed": 400
	});
	
	
	
	
	var sliderCliente = tns({
		"container": '#clientes .slideItems',
		//"autoHeight": true,
		"items": 5,
		"swipeAngle": false,
		"speed": 400,
		responsive: {
			568: {
				items: 3
			},
			1023: {
				items: 5
			},
			1200: {
				items: 5
			},
			1400: {
				items: 5
			}
		}
	});
	
		
	var t = setInterval(function(){
		sliderCliente.goTo('next');
	}, 1500);

}




function home_inicio2(){
	let generos = ["Hombre", "Mujer", "Nino"];
	
	generos.each(function(g){
		document.id('btn'+g).addEvent('mouseover', function(){
			document.id('over'+g).removeClass('oculto');
		}).addEvent('mouseout', function(){
			document.id('over'+g).addClass('oculto');
		});
	});
}








//::::::::::::::::::::::::
// ***** header *****//
/*
idagl.menu = 'off';
function header_run(){
	var btnMenu = document.id('btnMenu');
	var btnMenuClose = document.id('menuItemClose');
	var menu = document.id('menuItems');
	
	function menuActive(){
		if(idagl.menu === 'off'){
			idagl.menu = 'on';
			menu.removeClass('dnone');
			(function(){
				menu.addClass('activo');
			}).delay(10);
		} else{
			idagl.menu = 'off';
			menu.removeClass('activo');
			(function(){
				menu.addClass('dnone');
			}).delay(300);
		}
	}
	
	btnMenu.addEvent('click', menuActive);
	btnMenuClose.addEvent('click', menuActive);
}
*/






//::::::::::::::::::::::::
// ***** Footer *****//
function footer_run(){
	
	var sliderAlianzas = tns({
		"container": '#alianzas .slideItems',
		//"autoHeight": true,
		"items": 5,
		"swipeAngle": false,
		"speed": 400,
		responsive: {
			568: {
				items: 3
			},
			1023: {
				items: 5
			},
			1200: {
				items: 5
			},
			1400: {
				items: 5
			}
		}
	});
	
		
	var t = setInterval(function(){
		sliderAlianzas.goTo('next');
	}, 1500);
	
	
	
	
	
	
	//Funcion que se ejecuta antes de enviar los datos.
	idagl.ocupado = false;
	idagl.seguros = {};
	function sendAll(){
		idagl.seguros.msnManual = '';
		var datos = {};
		
		function condicion_siguiente(){
			var status = true;
			
			idagl.seguros.arrayAll = $$('#footerContactoForm *[data-validar]');
			status = idagl.seguros.arrayAll.every(function(item){
				return item.idago.validado === true;
			});
			if(status === false){ idagl.seguros.msnManual += 'Todos los campos son obligatorios.\r\n\r\n'; }
				
			return status;
		}	
		
		
		
		
		if(condicion_siguiente()){
			idagl.ocupado = true;
			
			var datos = new FormData(document.id('footerContactoForm'));
						
			function limpiar(j){
				if(j.status == "ok"){
					swal('', 'Se envio su mensaje con exito', 'success');
					//alert("El registro fue guardado con exito");
					idagl.ocupado = false;
					document.id('footerContactoForm').reset();
					//location.reload();
				} else{
					
				}
			}
			
			function error(j){
				swal('', 'Se produjo un error al ingresar el registro, póngase en contacto con su área de sistemas.', 'warning');
				console.info(j.errores);
				idagl.ocupado = false;
			}
			
			
			
			// Set up the request.
			var xhr = new XMLHttpRequest();
			
			// Open the connection.
			//xhr.open('POST', window.location.pathname+'/do_upload', true);
			xhr.open('POST', baseDir+"ajax/footerForm", true);
			
			// Set up a handler for when the request finishes.
			xhr.onload = function () {
				console.info(xhr);
				var j = JSON.parse(xhr.response);
				if (xhr.status === 200) {
					if(j.status === "ok"){
						limpiar(j);
					} else{
						error(j);
					}
				} else {
					alert('An error occurred!');
				}
			};
			
			// Send the Data.
			xhr.send(datos);
			//db_conectE(baseDir+"ajax/footerForm", datos, limpiar, error );
		
			
		} else{
			idagl.ocupado = false;
			alert(idagl.seguros.msnManual);
		}
	}
	
	
	function sendIntervencion(){
		if(idagl.ocupado == true){ return false; }
		sendAll();
		return false;
	}
	
	
	//Validacion de formulario:
	idaglGV_def.msn.validar.send.novalid = "Alguno de los campos tiene un error o está incompleto.\n\nFavor de verificar su información.";
	idaglGV_def.msn.validar.nulo = 'Este campo es obligatorio y debe contener datos, por favor capture la información correspondiente.\n\nverifique por favor.';
	
	var ml1 = [];
	
	ml1[0] = {
		objeto: 'texto',
		validar: {
			parametro: 'texto'
		},
			funciones: {
			nombre: 'mayusculas'
		},
	
		nulo: {
			status: false,
			valores: {
				//adicionales_c: true
			}
		}
	};
	
	ml1[2] = {
		objeto: 'correo',
		validar: {
			parametro: 'correo',
			error: 'El Correo Electrónico que ingresó no es válido. \n\nFavor de verificarlo.'
		},
		nulo: {
			status: false
		}
	};
	
	ml1[3] = {
		objeto: 'telefono',
		validar: {
			parametro: 'limite',
			valor: {
				unico: 10,
				invertir: true
			},
			error: 'El Número de Teléfono que ingresó está incompleto. \nFavor de ingresar los 10 dígitos de su número incluyendo lada'
		},
		funciones: [{
			nombre: 'solonumerico'
		}/*
, {
			nombre: 'autotexto',
			valor: '10 digitos con Lada...'
		}
*/
	]
	};
	
	
	
	idaV_inicio({
		formulario: 'footerContactoForm',
		lista: ml1,
		intervencion: sendIntervencion
	});
	
	
	var contactBtn = document.id('footerBtnEnviar');
	contactBtn.addEvent('click', function(){
		sendIntervencion();
		//document.getElementById("footerContactoForm").submit();
	});
}















// ***** Portafolio *****//
function portafolio_in(){	
	var formLogin = document.id('formPortaLogin');
	if(formLogin !== null){
		formLogin.addEvent('submit', function(e){
			e.preventDefault();
			e.stop();
			
			function error(j){
				swal('', 'la contraseña es incorrecta', 'warning');
			}
			
			function fin(j){
				var articuloP = document.id('rutaP').value +'articulo/'+ document.id('articuloP').value;
				window.location.replace(articuloP);
			}
			
			if(document.id('form-login-password').value !== ""){
				var datos = new FormData(document.id('formPortaLogin'));
				var rlogin = document.id('rutaP').value + 'login';
				db_conect2(rlogin, datos, fin, error);
			}
		});
	}
/*
	if(){
		
	}
*/
	
	var area = $$('#portafolios .slideItems');
	if(area.length > 0){
		var sliderPortafolio = tns({
			"container": '#portafolios .slideItems',
			//"autoHeight": true,
			"items": 1,
			"swipeAngle": false,
			"speed": 400
		});
	}
		
/*
	var t = setInterval(function(){
		sliderCliente.goTo('next');
	}, 1500);
*/

}














// ***** Portafolio *****//
function servicios_in(){	
	
	var sliderTitulo = tns({
		"container": '.mainbox.bl1 .slideItems',
		//"autoHeight": true,
		"items": 1,
		"swipeAngle": false,
		"speed": 400
	});
	
	var sliderServicio = tns({
		"container": '#galeria .slideItems',
		//"autoHeight": true,
		"items": 1,
		"swipeAngle": false,
		"speed": 400
	});
	
/*
	var t = setInterval(function(){
		sliderCliente.goTo('next');
	}, 1500);
*/

}











// ***** Portafolio *****//
function somos(){	
	
	var galeriav = tns({
		"container": '#galeriav .slideItems',
		//"autoHeight": true,
		"items": 1,
		"swipeAngle": false,
		"speed": 400
	});
	
	
	var galeriam = tns({
		"container": '#galeriam .slideItems',
		//"autoHeight": true,
		"items": 1,
		"swipeAngle": false,
		"speed": 400
	});
	
/*
	var t = setInterval(function(){
		sliderCliente.goTo('next');
	}, 1500);
*/

}
















//::::::::::::::::::::::::
// ***** Codigos para la carga de archivos *****//
function funDelBtnImgPrev(p){
	p.destroy();
}

function handleFiles(f){	
	var parent = this.getParent();
	if(!parent.hasClass('ida_boxInputContent')){
		parent = parent.getParent();
	}
	if(!parent.hasClass('ida_boxInputContent')){
		parent = parent.getParent();
	}
	if(!parent.hasClass('ida_boxInputContent')){
		parent = parent.getParent();
	}
	var preview = parent.getElement('.ida_areaDropUploadPreview');
	
	if(preview !== null){
		for (var i = 0; i < f.length; i++) {
			var file = f[i];
			var imageType = /image.*/;
			
			if (!file.type.match(imageType)) {
				continue;
			}
			
			var img = document.createElement("img");
			img.classList.add("obj");
			img.file = file;
			preview.appendChild(img);
			
			var boxPrev = new Element('div', {"class":"ida_boxPrevImg"});
				var btnDel = new Element('div', {"class":"ida_boxPrevImgDel"});
				btnDel.addEvent('click', function(){
					funDelBtnImgPrev(this.getParent());
				});
				var boxInfo = new Element('div', {"class":"ida_boxPrevImgInfoBox"});
					//var iNombre = new Element('div', {"class":"ida_boxPrevImgInfoName", "html":'Nombre: '+file.name});
					var iType = new Element('div', {"class":"ida_boxPrevImgInfoType", "html":'Tipo: '+file.type});
					var isize = new Element('div', {"class":"ida_boxPrevImgInfoName", "html":'Tamaño: '+((file.size / 1024) / 1000).toFixed(2)+'MB'});
				boxInfo.adopt([iType, isize]);
				
				boxPrev.adopt([img, btnDel, boxInfo]);
			preview.grab(boxPrev);
			
			var reader = new FileReader();
			reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
			reader.readAsDataURL(file);
		}
	} else{
		var parent = this.getParent();
		if(!parent.hasClass('ida_boxInputContent')){
			parent = parent.getParent();
		}
		
		var preview = parent.getElement('.idaUnArchivoInfo');
		if(preview !== null){
			var boxInfo = new Element('div', {"class":"ida_boxPrevImgInfoBox"});
				//var iNombre = new Element('div', {"class":"ida_boxPrevImgInfoName", "html":'Nombre: '+file.name});
				var iType = new Element('div', {"class":"ida_boxPrevImgInfoType", "html":'Tipo: '+f[0].type});
				var isize = new Element('div', {"class":"ida_boxPrevImgInfoName", "html":'Tamaño: '+((f[0].size / 1024) / 1000).toFixed(2)+'MB'});
			boxInfo.adopt([iType, isize]);
			preview.grab(boxInfo);
		}
	}
	
	
}


function dragenter(e) {
	e.stopPropagation();
	e.preventDefault();
	this.addClass('dentro');
}

function dragleave(e){
	e.stopPropagation();
	e.preventDefault();
	this.removeClass('dentro');
}

function dragend(){
	e.stopPropagation();
	e.preventDefault();
	this.removeClass('dentro');
}

function dragover(e) {
	e.stopPropagation();
	e.preventDefault();
}

function drop(e) {
	e.stopPropagation();
	e.preventDefault();
	this.removeClass('dentro');
	
	var dt = e.dataTransfer;
	var files = dt.files;
	
	handleFiles.call(this, files);
}


function idaDoClickActive(){
	var allBtn = $$('.idaInputLoadFileA');
	allBtn.each(function(b){
		b.addEvent('click', function(){
			var padre = this.getParent();
			var el = padre.getElement('input[type="file"]');
			if (el) {
				el.click();
			}
		});
	});
}


function idaDoClickActive(){
	var allBtn = $$('.idaInputLoadFileA');
	allBtn.each(function(b){
		b.addEvent('click', function(){
			var padre = this.getParent();
			var el = padre.getElement('input[type="file"]');
			if (el) {
				el.click();
			}
		});
	});
}


function idaDoDropActive(){
	var allDrop = $$('.ida_areaDropUpload');
	allDrop.each(function(b){
		b.addEventListener("dragenter", dragenter, false);
		b.addEventListener("dragleave", dragleave, false);
		b.addEventListener("dragend", dragend, false);
		b.addEventListener("dragover", dragover, false);
		b.addEventListener("drop", drop, false);
	});
}


function idaUploadFileFormActive(){
	//Funcion que se ejecuta antes de enviar los datos.
	idagl.ocupado = false;
	idagl.seguros = {};
	function sendAll(){
		idagl.seguros.msnManual = '';
		var datos = {};
		
		function condicion_siguiente(){
			var status = true;
			var temporal = true;
			
			idagl.seguros.arrayAll = $$('#formularioUpload *[data-validar]');
			idagl.seguros.arrayAll.each(function(v){
				if(v.value === '' || v.value === ' '){ status = false; console.info('esta vacio'); }
			});
			if(status === false){ idagl.seguros.msnManual += 'Todos los campos son obligatorios. Hay campos vacios, por favor llene toda la información.\r\n\r\n'; }
			
			temporal = true;
			temporal = idagl.seguros.arrayAll.every(function(item){
				return item.idago.validado === true;
			});
			if(temporal === false){ status = false; idagl.seguros.msnManual += 'Todos los campos tiene que tener un contenido valido y no etsar vacios.\r\n\r\n'; }
			
			if(document.id('pagina').value === 'modelo'){
				var multiUpload = $$('.ida_areaDropUploadPreview');
				var multiUploadFortos = multiUpload[0].getElements('img.obj');
				temporal = true;
				temporal = multiUploadFortos.every(function(item){
					return item.file.size <= 1024000;
				});
				if(temporal === false){ status = false; idagl.seguros.msnManual += 'Cada imagen no debe de pesar mas de 1Mb revise el peso de sus imagenes.\r\n\r\n'; }
				if(multiUploadFortos.length < 10){ status = false; idagl.seguros.msnManual += 'Debes de subir un minimo de 10 imagenes en la seccion "COMPARTIRNOS".\r\n\r\n'; }
			}
			
			
			var servicios = $$('.boxCheck input[type="checkbox"]');
			if(servicios.length > 0){
				var selectValor = false;
				servicios.each(function(s){
					if(s.checked === true){selectValor = true;}
				});
				if(selectValor === false){
					status = false;
					idagl.seguros.msnManual += 'No se ha seleccionado ni un servicio, eliga por lo menos un servicio de trabajo.\r\n\r\n';
				}
			}
			
			
			if(idagl.recaptcha !== "valido"){
				status = false;
				idagl.seguros.msnManual += 'Es obligatorio que valide el cuadro reCaptcha.\r\n\r\n';
			}
			
			if(document.id('terminosChek').checked !== true){
				status = false;
				idagl.seguros.msnManual += 'Debe de aceptar los terminos y condiciones.\r\n\r\n';
			}
			
			return status;
		}	
		
		
		
		
		if(condicion_siguiente()){
			idagl.ocupado = true;
			swal('', 'Se esta guardando su informacion...', 'warning');
			
			var datos = new FormData(document.id('formularioUpload'));
						
			function fin(j){
				if(j.status == "ok"){
					//swal('', 'Se envio su mensaje con exito', 'success');
					idagl.ocupado = false;
					document.id('formularioUpload').reset();
					var fileUno = $$('.idaUnArchivoInfo');
					fileUno.each(function(b){
						b.empty();
					});
					var fileMulti = $$('.ida_areaDropUploadPreview');
					fileMulti.each(function(b){
						b.empty();
					});
				} else{
					
				}
			}
			
			function error(j){
				var elError = j.errores.length;
				elError--;
				swal('', j.errores[elError], 'warning');
				
				console.info(j.errores);
				idagl.ocupado = false;
			}
			
			
			if(document.id('pagina').value === 'modelo'){
				var multiUpload = $$('.ida_areaDropUploadPreview');
				var multiUploadFortos = multiUpload[0].getElements('img.obj');
				document.id('fotosTotal').value = multiUploadFortos.length;
				var datos = new FormData(document.id('formularioUpload'));
				multiUploadFortos.each(function(i, index){
					datos.append('fotos_'+index, i.file, i.file.name);
				});
			}
			
			
			var ruta = document.id('formularioUpload').getProperty('data-send');
			db_conect(ruta, datos, fin, error);
		
			
		} else{
			idagl.ocupado = false;
			alert(idagl.seguros.msnManual);
		}
	}
	
	
	function sendIntervencion(){
		if(idagl.ocupado == true){ return false; }
		sendAll();
		return false;
	}
	
	
	//Validacion de formulario:
	idaglGV_def.msn.validar.send.novalid = "Alguno de los campos tiene un error o está incompleto.\n\nFavor de verificar su información.";
	idaglGV_def.msn.validar.nulo = 'Este campo es obligatorio y debe contener datos, por favor capture la información correspondiente.\n\nverifique por favor.';
	
	var ml1 = [];
	
	ml1[0] = {
		objeto: 'texto',
		validar: {
			parametro: 'texto'
		},
			funciones: {
// 			nombre: 'mayusculas'
		},
	
		nulo: {
			status: false,
			valores: {
				//adicionales_c: true
			}
		}
	};
	
	ml1[2] = {
		objeto: 'correo',
		validar: {
			parametro: 'correo',
			error: 'El Correo Electrónico que ingresó no es válido. \n\nFavor de verificarlo.'
		},
		nulo: {
			status: false
		}
	};
	
	ml1[3] = {
		objeto: 'telefono',
		validar: {
			parametro: 'limite',
			valor: {
				unico: 10,
				invertir: true
			},
			error: 'El Número de Teléfono que ingresó está incompleto. \nFavor de ingresar los 10 dígitos de su número incluyendo lada'
		},
		funciones: [{
			nombre: 'solonumerico'
		}/*
, {
			nombre: 'autotexto',
			valor: '10 digitos con Lada...'
		}
*/
	]
	};
	
	
	document.id('formularioUpload').addEvent('submit', function(e){
		e.stopPropagation();
		e.preventDefault();
	});
	
	idaV_inicio({
		formulario: 'formularioUpload',
		lista: ml1,
		intervencion: sendIntervencion
	});
	
	var contactBtn = document.id('ida_boxformBtnSend');
	contactBtn.addEvent('click', function(e){
		e.stopPropagation();
		e.preventDefault();
		sendIntervencion();
		//document.getElementById("footerContactoForm").submit();
	});
}




function bienRecaptcha(){
	idagl.recaptcha = "valido";
}

function viejoRecaptcha(){
	idagl.recaptcha = "expirado";
}

function malRecaptcha(){
	idagl.recaptcha = "incorrecto";
}





//::::::::::::::::::::::::
// ***** Portafolio *****//
/*
function portafolio_inicio(){
	items = $$('#portafolios .slideItems .item');
	items.reverse();
	
	var lateral = $$('#portafolios .mboxD_in .centro .nBox');
	lateral.reverse();
	
	var fondos = $$('#portFondosBox .itemFotoFondo');
	fondos.reverse();
	
	var scrollFX = new Fx.Scroll(window, {
	    offset: {
	        x: 0,
	        y: -83
	    }
	});
	
	items.each(function(it, i){
		var p = it.getPosition().y;
		
		lateral[i].addEvent('click', function(){
			scrollFX.toElement(it, 'y');
		});
	});
		
	document.addEventListener('scroll', function(event) {
		
		items.each(function(it, i){
			var h = it.getSize().y;
			var p = it.getPosition().y;
			var s = window.getScroll().y;
			if(s > (p - (h * 0.1)) && s < ( (h * 0.9) + p ) ){
				lateral[i].addClass('active');
				fondos[i].removeClass('op0');
			} else{
				lateral[i].removeClass('active');
				fondos[i].addClass('op0');
			}
		});
	});
	
}
*/














//::::::::::::::::::::::::
// ***** Servicios *****//
/*
function servicio_inicio(){
	//videoControl("bgvid", "#servicios .btnPlay",  "#servicios .btnPlayPause");
	//videoControl();
}
*/
















//::::::::::::::::::::::::
// ***** Portafolio Interior *****//
/*
function portafolio_in_inicio(){
	var logosBox = $$('#portafolio_main .informes .slideMain');
	if(logosBox.length > 0){
		
		var slider = tns({
			container: '#portafolio_main .slideItems',
			items: 2,
			controls:true,
			nav:false,
			autoplay: true,
			"autoplayText": ["▶", "❚❚" ],
			prevButton:'#portafolio_main .slideMain .btnSlideBack',
			nextButton:'#portafolio_main .slideMain .btnSlideNext',
			responsive: {
				825: {
					items: 3,
					autoplay: false
				}
			}
		});
	}
	
	
	videoControl();
}
*/















//::::::::::::::::::::::::
// ***** Servicios Interior *****//
/*
function servicios_in_inicio(){
	if(document.id('servicios_galeria') !== null){
				var slider = tns({
			container: '#servicios_galeria .slideItems',
			items: 1,
			nav:false,
			speed: 300,
			prevButton:'#servicios_galeria .mboxD_in .btnSlideBack',
			nextButton:'#servicios_galeria .mboxD_in .btnSlideNext',
			responsive: {
				780: {
					items: 1,
					autoplay:false
				},
				1023: {
					items: 1
				}
			}
		});
	}
	
	videoControl();
	
}
*/














/*
function vacantes(){
	videoControl();
}
*/
















//::::::::::::::::::::::::
// ***** Footer *****//
/*
function footer_run(){
	//Funcion que se ejecuta antes de enviar los datos.
	idagl.ocupado = false;
	idagl.seguros = {};
	function sendAll(){
		idagl.seguros.msnManual = '';
		var datos = {};
		
		function condicion_siguiente(){
			var status = true;
			
			idagl.seguros.arrayAll = $$('#footerContactoForm *[data-validar]');
			status = idagl.seguros.arrayAll.every(function(item){
				return item.idago.validado === true;
			});
			if(status === false){ idagl.seguros.msnManual += 'Todos los campos son obligatorios.\r\n\r\n'; }
				
			return status;
		}	
		
		
		
		
		if(condicion_siguiente()){
			idagl.ocupado = true;
			
			var datos = new FormData(document.id('footerContactoForm'));
						
			function limpiar(j){
				if(j.status == "ok"){
					swal('', 'Se envio su mensaje con exito', 'success');
					//alert("El registro fue guardado con exito");
					idagl.ocupado = false;
					document.id('footerContactoForm').reset();
					//location.reload();
				} else{
					
				}
			}
			
			function error(j){
				swal('', 'Se produjo un error al ingresar el registro, póngase en contacto con su área de sistemas.', 'warning');
				console.info(j.errores);
				idagl.ocupado = false;
			}
			
			
			
			// Set up the request.
			var xhr = new XMLHttpRequest();
			
			// Open the connection.
			//xhr.open('POST', window.location.pathname+'/do_upload', true);
			xhr.open('POST', baseDir+"ajax/footerForm", true);
			
			// Set up a handler for when the request finishes.
			xhr.onload = function () {
				console.info(xhr);
				var j = JSON.parse(xhr.response);
				if (xhr.status === 200) {
					if(j.status === "ok"){
						limpiar(j);
					} else{
						error(j);
					}
				} else {
					alert('An error occurred!');
				}
			};
			
			// Send the Data.
			xhr.send(datos);
			//db_conectE(baseDir+"ajax/footerForm", datos, limpiar, error );
		
			
		} else{
			idagl.ocupado = false;
			alert(idagl.seguros.msnManual);
		}
	}
	
	
	function sendIntervencion(){
		if(idagl.ocupado == true){ return false; }
		sendAll();
		return false;
	}
	
	
	//Validacion de formulario:
	idaglGV_def.msn.validar.send.novalid = "Alguno de los campos tiene un error o está incompleto.\n\nFavor de verificar su información.";
	idaglGV_def.msn.validar.nulo = 'Este campo es obligatorio y debe contener datos, por favor capture la información correspondiente.\n\nverifique por favor.';
	
	var ml1 = [];
	
	ml1[0] = {
		objeto: 'texto',
		validar: {
			parametro: 'texto'
		},
			funciones: {
			nombre: 'mayusculas'
		},
	
		nulo: {
			status: false,
			valores: {
				//adicionales_c: true
			}
		}
	};
	
	ml1[2] = {
		objeto: 'correo',
		validar: {
			parametro: 'correo',
			error: 'El Correo Electrónico que ingresó no es válido. \n\nFavor de verificarlo.'
		},
		nulo: {
			status: false
		}
	};
	
	ml1[3] = {
		objeto: 'telefono',
		validar: {
			parametro: 'limite',
			valor: {
				unico: 10,
				invertir: true
			},
			error: 'El Número de Teléfono que ingresó está incompleto. \nFavor de ingresar los 10 dígitos de su número incluyendo lada'
		},
		funciones: [{
			nombre: 'solonumerico'
		}	, {
			nombre: 'autotexto',
			valor: '10 digitos con Lada...'
		}
	]
	};
	
	
	
	idaV_inicio({
		formulario: 'footerContactoForm',
		lista: ml1,
		intervencion: sendIntervencion
	});
	
	
	var contactBtn = document.id('footerBtnEnviar');
	contactBtn.addEvent('click', function(){
		sendIntervencion();
		//document.getElementById("footerContactoForm").submit();
	});
}
*/





var normalize = (function() {
  var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç", 
      to   = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",
      mapping = {};
 
  for(var i = 0, j = from.length; i < j; i++ )
      mapping[ from.charAt( i ) ] = to.charAt( i );
 
  return function( str ) {
      var ret = [];
      for( var i = 0, j = str.length; i < j; i++ ) {
          var c = str.charAt( i );
          if( mapping.hasOwnProperty( str.charAt( i ) ) )
              ret.push( mapping[ c ] );
          else
              ret.push( c );
      }      
      return ret.join( '' ).replace( /[^-A-Za-z0-9]+/g, '' ).toLowerCase();
  }
 
})();



var globAc = {};


globAc.corte = {};
globAc.corte.valor = "";
function cortePut(){
	if(globAc.corte.valor === prenda.corte[this.idaVal.num] ){ return false; }
	if(globAc.corte.valor !== ""){
		globAc.corte.obj.removeClass('activo');
	}
	
	globAc.corte.obj = this;
	globAc.corte.valor = prenda.corte[this.idaVal.num];
	this.addClass('activo');
}

globAc.baseColor = {};
globAc.baseColor.color = "";
function colorPrenda(){
	if(globAc.baseColor.color === this.idaVal.color ){ return false; }
	if(globAc.baseColor.color !== ""){
		globAc.baseColor.bnt.removeClass('activo');
	}
	
	globAc.baseColor.bnt = this;
	globAc.baseColor.color = this.idaVal.color;
	globAc.baseColor.num = this.idaVal.num;
	this.addClass('activo');
	
	var box = document.id("prendaBaseColor");
	var imagen = prenda.color[this.idaVal.num].imagen;
	var img = new Element('img', {'src':imagen, 'class':''});
	box.empty();
	if(imagen === undefined){return false;}
	box.adopt([img]);
	
	
}




globAc.estampados = {};
globAc.estampados.modelNum = "";
function controlColModelo(){
	if(globAc.estampados.modelNum === this.idaVal.modelo ){ return false; }
	if(globAc.estampados.modelNum !== ""){
		globAc.estampados.modelBnt.removeClass('activo');
	}
	
	globAc.estampados.modelBnt = this;
	globAc.estampados.modelNum = this.idaVal.modelo;
	this.addClass('activo');
	
	
	var box = document.id("prendaEstampado");
	var imagen = prenda.estampados[this.idaVal.colec].modelosP[this.idaVal.modelo];
	if(imagen === undefined){box.empty(); return false;}
	var img = new Element('img', {'src':imagen.imagen, 'class':'blendM1'});
	var img2 = new Element('img', {'src':imagen.imagen, 'class':'blendM2'});
	box.empty();
	if(imagen === undefined){return false;}
	box.adopt([img, img2]);
}

globAc.estampados.colecNum = "";
function controlColecciones(){
	if(globAc.estampados.colecNum === this.idaVal.valor ){ return false; }
	if(globAc.estampados.colecNum !== ""){
		globAc.estampados.colecBnt.removeClass('activo');
	}
	
	globAc.estampados.colecBnt = this;
	globAc.estampados.colecNum = this.idaVal.valor;
	globAc.estampados.modelNum = "";
	this.addClass('activo');
	
	var boxModelos = document.id('valoresBoxColeccionModelos');
	boxModelos.empty();
	var valorNumero = this.idaVal.valor;
	
	prenda.estampados[valorNumero].modelos.each(function(m, index){
		var box = new Element('div', {'class':'modeloBox'});
			var imgBox = new Element('div', {'class':'boxImgM'});
				var img = new Element('img', {'src':m.imagen});
				imgBox.idaVal = {};
				imgBox.idaVal.colec = valorNumero;
				imgBox.idaVal.modelo = index;
				imgBox.addEvent('click', function(){
					controlColModelo.call(this);
				});
				imgBox.grab(img);
			var titulo = new Element('span', {'html':m.titulo});
			box.adopt([imgBox, titulo]);
		boxModelos.grab(box);
	});
}

globAc.estampados.clear = "";
function clearEstampado(){
	//if(globAc.estampados.clear === this.idaVal.valor ){ return false; }
	
	if(globAc.estampados.modelNum !== ""){
		globAc.estampados.modelBnt.removeClass('activo');
	}
	if(globAc.estampados.colecNum !== ""){
		globAc.estampados.colecBnt.removeClass('activo');
	}
	this.addClass('activo');
	
	var boxModelos = document.id('valoresBoxColeccionModelos');
	boxModelos.empty();
	
	var box = document.id("prendaEstampado");
	box.empty();
	
	globAc.estampados.modelNum = "";
	globAc.estampados.modelBnt = "";
	globAc.estampados.colecNum = "sin";
	globAc.estampados.colecBnt = this;
	globAc.estampados.clear = this.idaVal.valor;
}



function controlNumero(){
	var pos = $$('#prendaVFija .optionBoxMainValores select[name="ubicacion"]');
	pos = pos[0];
	var numero = $$('#prendaVFija .optionBoxMainValores input[name="numero"]');
	numero = numero[0];
	
	if(numero.value === ""){return false;};
	
	var textoC = document.id('prendaNumero').getElement('.posCentro span');
	var textoD = document.id('prendaNumero').getElement('.posDerecha span');
	var textoI = document.id('prendaNumero').getElement('.posIzquierda span');
	
	textoC.empty();
	textoD.empty();
	textoI.empty();
	
	switch(pos.value){
		case "centro":
			textoC.set('html', numero.value);
		break;
		
		case "derecha":
			textoD.set('html', numero.value);
		break;
		
		case "izquierda":
			textoI.set('html', numero.value);
		break;
	}
}


function controlTipogra(){
	var prendaI =  document.id('prendaI');
	
	prendaI.setStyle('font-family', this.value);
}




function activarFijosPrenda(){
	var colecciones = $$('#prendaVFija .optionBoxColValores > .prendaBoxColeccion .btnPrendaColec');
	colecciones.each(function(c, index){
		c.idaVal = {};
		c.idaVal.valor = index;
		c.addEvent('click', function(){
			controlColecciones.call(this);
		});
	});
	
	var boxClearEstampado = document.id("sinEstampado");
	var btnClearEstampado = boxClearEstampado.getElement(".btnPrendaColec");
	btnClearEstampado.idaVal = {};
	btnClearEstampado.idaVal.valor = "clear";
	btnClearEstampado.addEvent("click", function(){
		clearEstampado.call(this);
	});
	
	
	var colores = $$('#prendaVFija .mainBoxOptionColor .optionBoxMainValores .miniBoxColor');
	colores.each(function(c, index){
		c.idaVal = {};
		c.idaVal.num = index;
		c.idaVal.color = c.getProperty("data-color");
		c.addEvent('click', function(){
			colorPrenda.call(this);
		});
		if(index === 0){colorPrenda.call(c);}
	});
	
	
	var corte = $$('#prendaVFija .mainBoxOptionCorte .optionBoxMainValores > div .optionValue');
	corte.each(function(c, index){
		c.idaVal = {};
		c.idaVal.num = index;
		c.addEvent('click', function(){
			cortePut.call(this);
		});
		if(index === 0){cortePut.call(c);}
	});
	
	
	var nombre = $$('#prendaVFija .optionBoxMainValores input[name="nombre"]');
	nombre = nombre[0];
	nombre.addEvent('change', function(){
		var texto = document.id('prendaNombre').getElement('.posCentro span');
		texto.empty().set('html', this.value);
	});
	
	var numero = $$('#prendaVFija .optionBoxMainValores input[name="numero"]');
	numero = numero[0];
	numero.addEvent('change', function(){
		controlNumero();
	});
	
	var posicion = $$('#prendaVFija .optionBoxMainValores select[name="ubicacion"]');
	posicion = posicion[0];
	posicion.addEvent('change', function(){
		controlNumero();
	});
	
	var tipografia = $$('#prendaVFija .optionBoxMainValores select[name="tipografia"]');
	tipografia = tipografia[0];
	tipografia.addEvent('change', function(){
		controlTipogra.call(this);
	});
	controlTipogra.call(tipografia);
	
	
}




var peeg = {};
peeg.op = [];
function getOptionSelect(){
	var conjunto = "";
	
	peeg.op.each(function(o, index){
		if(index !== 0){ conjunto += " / " }
		conjunto += peeg[o.name].valorActivo;
	});
	
	var datosActivos = null;
	peeg.query.data.products.edges[0].node.variants.edges.each(function(ov){
		if(ov.node.title == conjunto){
			datosActivos = ov.node;
		}
	});
	
	console.info(datosActivos);
	//var mainImageBox = document.id('prendaBaseColor');
	//var imagen = new Element('img', {'src':datosActivos.image.src, 'alt':datosActivos.image.altText});
	//mainImageBox.empty().grab(imagen);
}

function opcionesInteraccion(){
	console.info(peeg[this.idaVal.opcion].btnActivo);
	if(peeg[this.idaVal.opcion].btnActivo !== ""){
		peeg[this.idaVal.opcion].btnActivo.removeClass('activo');
	}
	
	peeg[this.idaVal.opcion].btnActivo = this
	this.addClass('activo');
	peeg[this.idaVal.opcion].valorActivo = this.idaVal.valor;
	
	getOptionSelect();
}

function colocarPrenda(j){
	peeg.query = j;
	console.info(j.data.products.edges[0].node);
	var v = j.data.products.edges[0].node;
	var mainImageBox = document.id('prendaI');
	var mainInfoBox = document.id('prendaVDinamica');
	
	peeg.op = v.options;
	v.options.each(function(o){
		peeg[o.name] = {};
		peeg[o.name].valorActivo = o.values[0];
		peeg[o.name].btnActivo = "";
		
		var laClase = "optionValue";
		if(o.name == "Talla" || o.name == "Size"){
			laClase += " optionTalla";
		} else if(o.name == "Color"){
			laClase += " optionColor";
		}
		
		var boxOpcion = new Element('div', {'class':'mainBoxOption'});
			var boxOptionTitulo = new Element('div', {'class':'optionTitulo', 'html':o.name});
			var boxOptionBoxValores = new Element('div', {'class':'optionBoxMainValores'});
			o.values.each(function(va, index){
				var boxOptionValues = new Element('span', {'class':laClase, 'html':va});
					boxOptionValues.idaVal = {'opcion':o.name, 'valor':va};
					boxOptionValues.addEvent('click', function(){
						opcionesInteraccion.call(this);
					});
				if(index === 0){ peeg[o.name].btnActivo = boxOptionValues; boxOptionValues.addClass('activo'); }
				
				if(o.name == "Color"){
/*
					var miniBoxColor = new Element('div', {'class':'miniBoxColor'});
					var cclean = normalize(va);
					//var nameClean = "color"
						var circuloColor = new Element('div', {'class':'circuloColor color'+cclean});
							circuloColor.idaVal = {'opcion':o.name, 'valor':va};
							circuloColor.addEvent('click', function(){
								opcionesInteraccion.call(this);
							});
							var boxOptionValues = new Element('span', {'class':laClase, 'html':va});
					
					if(index === 0){ peeg[o.name].btnActivo = circuloColor; circuloColor.addClass('activo'); }
					miniBoxColor.adopt([circuloColor, boxOptionValues]);
					boxOptionBoxValores.grab(miniBoxColor);
*/
				} else if(o.name == "Tipo de Corte"){
					
				} else{
					boxOptionBoxValores.grab(boxOptionValues);
				}
			});
		if(o.name == "Talla"){
			boxOpcion.adopt([boxOptionTitulo, boxOptionBoxValores]);
		}
		
		mainInfoBox.grab(boxOpcion);
	});
	
	getOptionSelect();
}


function shopify(genero, valorA){
/*
	import Client from 'shopify-buy';

	// Initializing a client to return content in the store's primary language
	const client = Client.buildClient({
		domain: 'idasoporte.myshopify.com',
		storefrontAccessToken: 'eda8f84d885e76a0763bb1a6c91da226'
	});
*/
	
	
	//const fetch = require('node-fetch');

	// Shop specific setup constants 
/*
	const args = process.argv.slice(2);
	const shopUrl = args[0] || "idasoporte.myshopify.com";
	const accessToken = args[1] || "eda8f84d885e76a0763bb1a6c91da226";
*/
	
	
	const shopUrl = "https://tocho-ropa-deportiva.myshopify.com/api/graphql";
	const accessToken = "010a395b12b4ede346efe5d51d53410c";
	
	// Simple GraphQL with no variables
	const query = `
		{
		  products(query: "tag:'personalizable' AND tag:'`+genero+`' AND tag:'`+valorA+`'", first: 1) {
		    edges {
		      node {
		        id
		        handle
		        descriptionHtml
		        variants(first: 99) {
		          edges {
		            node {
		              price
		              title
		              product {
		                descriptionHtml
		                handle
		                images(first: 10) {
		                  edges {
		                    node {
		                      altText
		                      src
		                    }
		                  }
		                }
		                title
		              }
		              id
		              sku
		              image {
		                altText
		                src
		              }
		            }
		          }
		        }
		        options {
		          name
		          values
		        }
		        title
		        images(first: 10) {
		          edges {
		            node {
		              altText
		              src
		            }
		          }
		        }
		      }
		    }
		  }
		}
	`;
	
	
/*
	const query = `{
  collectionByHandle(handle: "`+area+`") {
    title
    products(first: 20) {
      edges {
        node {
          availableForSale
          descriptionHtml
          handle
          images(first: 10) {
            edges {
              node {
                altText
                src
              }
            }
          }
          options {
            name
            values
          }
          title
          variants(first: 100) {
            edges {
              node {
                available
                availableForSale
                image {
                  altText
                  src
                }
                price
                sku
                title
              }
            }
          }
        }
      }
    }
  }
}
	`;
*/
	
	
/*
	const query = `{
  products(query: "collection:'hombre' AND handle:'short'", first: 1) {
    edges {
      node {
        id
        images(first: 10) {
          edges {
            node {
              altText
              id
              src
            }
          }
        }
        handle
        title
        variants(first: 90) {
          edges {
            node {
              title
              id
              price
              available
              availableForSale
              image {
                altText
                src
              }
              sku
            }
            cursor
          }
        }
        availableForSale
        descriptionHtml
      }
    }
  }
}
`;
*/
/*
	const query = `{
  collections(first: 10) {
    edges {
      node {
        id
        handle
        title
        products(first: 250) {
          edges {
            node {
              availableForSale
              description
              descriptionHtml
              id
              images(first: 8) {
                edges {
                  node {
                    altText
                    src
                  }
                }
              }
              options(first: 6) {
                id
                name
                values
              }
              productType
              tags
              title
              variants(first: 3) {
                edges {
                  node {
                    available
                    id
                    image {
                      altText
                      src
                    }
                    price
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}
`;
*/

/*
	query = `{
	  products(query: "collection:'hombre'", first: 10) {
	    edges {
	      node {
	        id
	        images(first: 10) {
	          edges {
	            node {
	              altText
	              id
	              src
	            }
	          }
	        }
	        description
	        handle
	        title
	        variants(first: 90) {
	          edges {
	            node {
	              title
	              id
	              price
	            }
	            cursor
	          }
	        }
	      }
	    }
	  }
	}
	`;
*/

	
	
/*
	const query = `{
	   shop {
	     name
	   }
	 }`;
*/
	 
	
	
/*
	const query = `{
	  collection(id: "182077849642") {
	    products(query:"title:'test-title'", first: 10) {
	      edges {
	        node {
	          id
	        }
	      }
	    }
	  }
	}`;
*/
	
	
	
/*
	const query = `{
	   shop {
	     name
	   }
	 }`;
	 
	function apiCall(query) {
	  return fetch(shopUrl, {
	    credentials: 'include',
	    method: 'POST',
	    headers: {
	      'Content-Type': 'application/graphql',
	      "Access-Control-Origin": "*",
	      'X-Shopify-Storefront-Access-Token': "abcce6c73f1d06551bd87175f38d467e"
	    },
	    "body": query
	  }).then(response => response.json());
	}
	 
	apiCall(query).then(response => {
	  console.log(response)
	});
*/

	
	var request = new XMLHttpRequest();
    request.open('POST', shopUrl, true);
    request.setRequestHeader('Content-Type', 'application/graphql; charset=UTF-8');
    request.setRequestHeader('X-Shopify-Storefront-Access-Token', '010a395b12b4ede346efe5d51d53410c');
    request.responseType = 'json';

    request.onload = function() {
    	// Only handle status code 200
		if(request.status === 200) {
			colocarPrenda(request.response);
		}
    };

    request.send(query);
    
    
    
    
    
	
/*
	var myRequest = new Request({url: 'https://idasoporte.myshopify.com/admin/api/graphql', method: 'post', headers: {'Content-Type': 'application/graphql', 'X-Shopify-Storefront-Access-Token':accessToken}});
	myRequest.send(query1);
*/



/*
let settings = {
    'async': true,
    'crossDomain': true,
    'url': 'https://idasoporte.myshopify.com/api/graphql',
    'method': 'POST',
    'headers': {
        'X-Shopify-Storefront-Access-Token': 'abcce6c73f1d06551bd87175f38d467e',
        'Content-Type': 'application/graphql',
    },
    'data': query1
};

var myRequest = new Request(settings);
myRequest.send();
*/

// Get checkout URL from shopify
/*
return $.ajax(settings).done(function (response) {
    console.log(response);
});
*/


	
	
/*
	const fetchQuery1 = () => {
	    // Define options for first query with no variables and body is string and not a json object
	    const optionsQuery1 = {
	        method: "post",
	        headers: {
	            "Content-Type": "application/graphql",
	            "X-Shopify-Storefront-Access-Token": accessToken
	        },
	        body: query1
	    };
	
	    // Fetch data and remember product id
	    fetch(shopUrl + `/api/graphql`, optionsQuery1)
	        .then(res => res.json())
	        .then(response => {
	            productId = response.data.products.edges[0].node.id; 
	            console.log("=============== Fetch First Product ===============");
	            console.log(JSON.stringify(response, null, 4));
	            fetchQuery2(productId)  
	        });
	}
*/
	
	//fetchQuery1();
}










//--- Eventos a ejecutar cuando el DOM este listo _____________________________________________________________________________________
window.addEvent('domready', function(){
	if(typeof pageActual !== 'undefined'){
		if(pageActual !== ''){
			switch(pageActual){
				case 'home':
					//home_inicio();
					var rellax = new Rellax('.rellax');
					home_inicio2();
				break;
				
				case 'productos':
					
				break;
				
				case 'somos':
					somos();
				break;
				
				case 'portafolio':
					//portafolio_inicio();
				break;
				
				case 'servicios':
					//servicio_inicio();
				break;
				
				case 'portafolio_in':
					portafolio_in();
				break;
				
				case 'servicios_in':
					servicios_in();
				break;
				
				case 'page_postulate':
					idaDoClickActive();
					idaDoDropActive();
					idaUploadFileFormActive();
				break;
				
			}
		}
	}
	
	if(typeof prendaSi !== 'undefined'){
		if(prendaSi === true){
			shopify(genero, valorA);
			activarFijosPrenda();
		}
	}
	
	if(typeof overGeneros !== 'undefined'){
		if(overGeneros === true){
			let generos = ["Basico", "Personalizado"];
		
			generos.each(function(g){
				document.id('btn'+g).addEvent('mouseover', function(){
					document.id('over'+g).removeClass('oculto');
				}).addEvent('mouseout', function(){
					document.id('over'+g).addClass('oculto');
				});
			});
		}
	}
	
	//header_run();
	//footer_run();
	
});


//--- Eventos a ejecutar cuando la pagina este cargada _____________________________________________________________________________________
window.addEvent('load', function(){
	
});








