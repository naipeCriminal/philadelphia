<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="safe-container articuloDetalle">
  <div class="row">
    <div class="col-md-3 reset-padding">
      <div class="table">
        <div class="cell-center">
          <a href="?page_id=447">
            <button class="btn form-control btn-default">regresar a articulos</button>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-6 text-center section-details">
      <h1 class="bemio">Professional</h1>
      <h3 class="bjack">Innovation Center</h3>
    </div>
    <?php
    if ( has_post_thumbnail() ) {
    $imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); $ruta_imagen = $imagen[0];
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
    <div class="col-md-6 reset-padding">
      <button class="btn form-control btn-default btn-imprimir">Imprimir</button>
    </div>
    <div class="col-md-6 reset-padding">
      <button class="btn form-control btn-facebook">compartir en fb</button>
    </div>
  </div>
</div>
<?php endwhile; else: ?> <h2>No encontrado</h2> <p>Lo sentimos, intente utilizar nuestro formulario de b&uacute;squedas.</p> <?php endif; ?>