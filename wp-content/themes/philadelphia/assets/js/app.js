var App = (function(){

	

	function initialize() {

		/* position Amsterdam */
		var latlng = new google.maps.LatLng(52.3731, 4.8922);

		var mapOptions = {
		center: latlng,
		scrollWheel: false,
		zoom: 13
		};

		var marker = new google.maps.Marker({
		position: latlng,
		url: '/',
		animation: google.maps.Animation.DROP
		});

		var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
		marker.setMap(map);

	};

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


