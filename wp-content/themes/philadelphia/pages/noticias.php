<div class="safe-container">
  <div class="row text-center">
    <h1 class="uppercase bemio blue-default">Noticias</h1>
  </div>
</div>
<div class="safe-container">
  <div class="row pic">
    <?php
    $args = array('showposts'=>-1,  'post_type'=>'noticia');
    $query = new WP_Query($args);
    if ( have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <?php global $post;$thumbID = get_post_thumbnail_id( $post->ID );$imgDestacada = wp_get_attachment_url( $thumbID );?>
    <div class="col-md-4 seccion section-new" style="background-image:url(<?php echo $imgDestacada; ?>);">
      <div class="table">
        <div class="cell-bottom">
          <div class="pleca">
            <div class="table">
              <div class="cell-center">
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="bemio">
                  <h3 class="new-title"><?php the_title(); ?></h3>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; else: ?>
    <h2>No encontrado</h2>
    <p>Lo sentimos, intente utilizar nuestro formulario de b&uacute;squedas.</p>
    <?php endif; ?>
    <?php wp_reset_query();
    ?>
  </div>
</div>