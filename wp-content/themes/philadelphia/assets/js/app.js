var App = (function(){

	function animaMenu(){
		$(".checkbox span").textillate({in:{effect:'rollIn'}});
	}
	function animaPost(){
		$(".thumbnail .titulote a").textillate({in:{effect:'fadeInUp',delayScale:10,delay:13,sequense:true,},out:{effect:'fadeOutDown',sequense:true,}});
	}

	function iniciaEventos(){
		$('.titulote p').on({mouseenter: function(){
		        $(this).animate({fontSize: 20});
		    },
		    mouseleave: function(){
		        $(this).animate({fontSize: 15});
		    }
		});
	}
	function guardar(){
		$.ajax({
			url: 'wp-content/themes/philadelphia/assets/php/guardar.php',
			type: 'POST',
			data: $("#registro").serialize(),
		})
		.done(function(msj) {

			// alert(msj);



			// if(msj=="Registro exitoso") {
			// 	$(".suscribete").fadeOut('fast');
			// 	$("div .ok").html("<span class='white'><p>¡Listo! </p><p>Te enviamos un correo de confirmación.</p><p>Gracias por ser parte del mundo Splenda®</p><span>");
			// }else{
				$(".respuesta").html(msj);
			// }
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});	
	}

	//Métodos públicos
	return{
		init: function(){
			iniciaEventos();
			animaMenu();
			animaPost();

			$(".mandarCorreo").on("click",function(e){
				e.preventDefault();
		        guardar();
		        // alert("bien asesino")
		    });

		}
	}

})();


