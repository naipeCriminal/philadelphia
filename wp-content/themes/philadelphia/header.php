<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/layout.css"> 
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.css">
	<!-- <link rel="stylesheet" href="<?php #bloginfo('template_url'); ?>/assets/css/bootstrap-theme.css"> -->
	<!-- <link rel="stylesheet" href="<?php #bloginfo('template_url'); ?>/assets/css/custom.css"> -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/style.css">
	<!-- <link rel="stylesheet" href="<?php #bloginfo('template_url'); ?>/assets/css/animate.css"> -->
	<?php wp_head(); ?>
</head>
<body> 
  <?php if ( is_user_logged_in() ) {?><a href="<?php echo wp_logout_url(); ?>">Logout</a> <?php } ?> 
  
  <div class="container" id="container-header">
          <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <div id="logo"></div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>      
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <div class="row azulPhiladelphia">
                 <div class="col-md-2 col-md-offset-2">
                      <div class="dentro">
                        <a href="?page_id=293">CENTRO GASTRONÓMICO</a>
                      </div>
                 </div>
                 <div class="col-md-2">
                      <div class="dentro">
                        <a href="?page_id=317">CASOS DE ÉXITO</a>
                      </div>
                 </div>               
                 <div class="col-md-1">
                      <div class="dentro">
                        <a href="?page_id=310">PRODUCTO</a>
                      </div>
                 </div>               
                 <div class="col-md-1">
                      <div class="dentro">
                        <a href="?page_id=390">CONTACTO</a>
                      </div>
                 </div>
                 <div class="col-md-2">
                      <div class="dentro">
                        <a href="?page_id=397">REGISTRO / INGRESO</a>
                      </div>
                 </div>
                 <div class="col-md-2">
                      <div class="dentro">
                        <a href="">SIGUENOS EN</a>
                      </div>
                 </div>
            </div>
            <div class="row">
                <div class="col-md-offset-2 col-md-2"> 
                    <p>PERSONALIZA TU SITIO<br> ¿QUE QUIERES VER?</p>
                </div>
                <div class="col-md-2">
                  <div class="checkbox" data-filtro="all">
                    <span>TODO</span>
                    <input type="checkbox" value="None" id="PANADERÍA-Y-PARTELERIA" name="check" checked />
                     <label for="P"></label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="checkbox" data-filtro="panaderia">
                    <span>PANADERÍA</span>
                    <input type="checkbox" value="None" id="PANADERÍA-Y-PARTELERIA" name="check" checked />
                    <label for="P"></label>
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="checkbox" data-filtro="hoteles-y-restaurantes">                  
                    <span>HOTELES Y RESTAURANTES</span>
                    <input type="checkbox" value="None" id="HOTELES-Y-RESTAURANTES" name="check" checked />
                    <label for="p"></label>
                  </div>
                 </div>
                  <div class="col-md-2">
                    <div class="checkbox" data-filtro="pasteleria-y-cafeteria">
                      <span class="pasteleria-y-cafeteria">CAFÉS Y PASTELERÍA</span>
                      <input type="checkbox" value="None"  name="check" checked />
                      <label for="p"></label>
                    </div>
                  </div>
            </div>
            </div>
          </div>
        </div>
      </nav>
  </div>