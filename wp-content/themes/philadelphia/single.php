<?php get_header(); ?> 
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
    <div class="container articuloDetalle">
      <div class="row">
        <div class="col-md-3"><button>regresar a articulos</button></div>
        <div class="col-md-9">profecional innovation center</div>
		<?php 
		if ( has_post_thumbnail() ) { 
			global $post; $imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); $ruta_imagen = $imagen[0];  ?> 
		?>
		<div class="col-md-12" style="width: 100%;height: 550px;background:url(<?php echo $ruta_imagen ?>);background-size: cover; background-position: center center;"></div>
		<?php } else{ echo 'no hay imagen';} ?>
        <div class="col-md-12" style="background:#004282;">
          <h2 style="color:#fff;" class="bemio"><?php echo get_post_type( $post ); ?></h2>
          <h3 style="color:#fff;" ><?php the_title(); ?></h3>
          <p style="color:#fff;" ><?php the_time('j') ?> de <?php the_time('F, Y') ?> </p>
        </div>
        <div class="col-md-12" style="color:#225b93; background:#fff;">
          <?php the_content(); ?>
        </div>
        <div class="col-md-6">
          <button>version para imprimir</button>
        </div>
        <div class="col-md-6">
          <button>compartir en fb</button>
        </div>
      </div>
    </div>
<?php endwhile; else: ?> <h2>No encontrado</h2> <p>Lo sentimos, intente utilizar nuestro formulario de b&uacute;squedas.</p> <?php endif; ?> 
 <?php get_footer(); ?>