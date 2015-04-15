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

		$(document).on("click", ".share-facebook", function(event) {
            event.preventDefault();
            var publish = {
                method: 'feed',
                name: $(this).data('fbname'),
                caption: $(this).data('fbcaption'),
                description: $(this).data('fbdescription'),
                link: window.location.href,
                picture: $(this).data('fbpicture')
            };
            FB.ui(publish);
        });
	}

	function guardar(){
		$.ajax({
			url: 'wp-content/themes/philadelphia/assets/php/guardar.php',
			type: 'POST',
			data: $("#registro").serialize(),
		})
		.done(function(msj) {

			$(".respuesta").html(msj);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});	
	}

	function initializeMaps () {
	  var mapOptions = {
	    center: new google.maps.LatLng(19.379111,-99.141639),
	    zoom: 8,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
	  
	  var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	  
	  var markers = [
	        ['Centro Gastronómico Mondelez, Distrito Federal', 19.379111,-99.141639]
	        // ['Palace of Westminster, London', 51.499633,-0.124755]
	  ];
	  
	  
	  // markers & place each one on the map  
	  for( i = 0; i < markers.length; i++ ) {
	    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
	    bounds.extend(position);
	    marker = new google.maps.Marker({
	      position: position,
	      map: map,
	      title: markers[i][0]
	    });

	    // Automatically center the map fitting all markers on the screen
	    map.fitBounds(bounds);
	  }	  
	}
	google.maps.event.addDomListener(window, 'load', initializeMaps);


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


