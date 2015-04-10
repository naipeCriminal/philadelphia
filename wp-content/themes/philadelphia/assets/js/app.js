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

	//Métodos públicos
	return{
		init: function(){
			iniciaEventos();
			animaMenu();
			animaPost();
		}
	}

})();


