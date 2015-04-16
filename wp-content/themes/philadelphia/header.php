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
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/print.css">
    <!-- <link rel="stylesheet" href="<?php #bloginfo('template_url'); ?>/assets/css/animate.css"> -->
    <?php
    global $post;
    //print_r($post);
    if( $post->post_type =="receta" || 
        $post->post_type =="noticia" || 
        $post->post_type =="tip" || 
        $post->post_type =="ing" || 
        $post->post_type =="sweet-report" || 
        $post->post_type =="cocina-salud" ||
        $post->post_type =="cobertura-de-cursos" ||
        $post->post_type =="tip-philadelphia" ||
        $post->post_type =="pasos-para-subir" ||
        $post->post_type =="new-and-tasty" ||
        $post->post_type =="el-ingrediente-hot" ||
        $post->post_type =="philly-trends" ||
        $post->post_type =="sweet-reports" ||
        $post->post_type =="philly-lab"){

      $thumbID = get_post_thumbnail_id( $post->ID );
      $imgDestacada = wp_get_attachment_url( $thumbID );
      
      $ogTitle = $post->post_title;
      if( $post->post_type =="receta" ){
        $ogDescription = "Philadelphia® Food Service tiene para ti la receta de ".$post->title.", preparada por los Chefs de nuestro Centro Gastronómico";
      }else{
        $content = $post->post_content;
        if( strlen($content) > 140 ){
          $content = substr($post->post_content,0,140)."...";
        }
        $ogDescription = $content;    
      }
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
      <a href="?p=1043">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/quieroPhilly.png" alt="" id="quiero-philly">
      </a>
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
                  <a href="https://www.facebook.com/philadelphiamx" target="_blank">SÍGUENOS EN <img src="<?php bloginfo('template_url'); ?>/assets/img/fb-icon.png" alt=""></a>
                </li>
                <li class="salir">
                  <?php
                  global $current_user;
                  if ( is_user_logged_in() ) {
                  ?>
                  <a href="<?php echo wp_logout_url(); ?>">Salir</a>
                  <p>¡Hola <?= $current_user->user_login; ?>!</p>
                  <?php } else { ?>
                  <a href="?page_id=397">REGISTRO / INGRESO</a>
                  <?php } ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>