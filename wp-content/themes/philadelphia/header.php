<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name') ?> <?php wp_title( '|', true, 'left' ); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/layout.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="<?php #bloginfo('template_url'); ?>/assets/css/bootstrap-theme.css"> -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/custom.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/style.css">
    <!-- <link rel="stylesheet" href="<?php #bloginfo('template_url'); ?>/assets/css/animate.css"> -->

    <?php 
      global $post;
      //print_r($post);
      if($post->post_type =="receta"){ 
        $thumbID = get_post_thumbnail_id( $post->ID );
        $imgDestacada = wp_get_attachment_url( $thumbID );
        
        $ogTitle = $post->post_title;
        $ogDescription = "Philadelphia® Food Service tiene para ti la receta de ".$post->title.", preparada por los Chefs de nuestro Centro Gastronómico";
        $ogUrl = $post->guid;
        $ogImage = $imgDestacada;
    ?>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $ogTitle ?>">
    <meta property="og:site_name" content="<?php bloginfo('name') ?>">
    <meta property="og:url" content="<?= $ogUrl ?>">
    <meta property="og:description" content="<?= $ogDescription ?>">
    <meta property="og:image" content="<?= $ogImage ?>">
    <?php } ?>

    <?php wp_head(); ?>
  </head>
  <body>
    <div class="container" id="container-header">
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/estatico/background-header.png);">
            <div class="row">
              <ul>
                <li>
                  <a href="http://www.developercatorcedias.com/foodservice/site">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/estatico/logo.png" alt="">
                  </a>
                </li>
                <li>
                  <a href="?page_id=293">CENTRO GASTRONÓMICO</a>
                </li>
                <li>
                    <a href="?page_id=317">CASOS DE ÉXITO</a>
                </li>
                <li>
                    <a href="?page_id=310">PRODUCTO</a>
                </li>
                <li>
                    <a href="?page_id=390">CONTACTO</a>
                </li>
                <li>
                  <?php if ( is_user_logged_in() ) {?>
                    <a href="<?php echo wp_logout_url(); ?>">Salir</a>
                   <?php } else { ?> 
                    <a href="?page_id=397">REGISTRO / INGRESO</a>
                  <?php } ?>
                </li>
                <li>
                    <a href="">SIGUENOS EN <img src="<?php bloginfo('template_url'); ?>/assets/img/fb-icon.png" alt=""></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>