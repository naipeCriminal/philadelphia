<div class="container ">
  <div class="row pic">
    <h1 class="bemio">PROFESSIONAL <br> <span class="bjack">Innovation Center</span></h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium reiciendis minus quaerat veniam alias rem consequatur repellat dolore odio accusamus, nisi officiis, maxime enim, hic expedita. Dolorum quos nemo veritatis.</p>
  <?php
            // = new WP_Query(array( 'post_type' => array( 'receta', 'tips'), 'category__in' => $cats, 'posts_per_page' => '-1', 'paged' => $paged) ); 
  

  $args = array('showposts'=>-1,'orderby'=>'rand', 'post_type'=>array('new-and-tasty','el-ingrediente-hot','philly-trends','sweet-reports','cocina-salud','philly-lab','cobertura-de-cursos'));
  $query = new WP_Query($args);
   if ( have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
  <?php 
  global $post;
  $imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
  $ruta_imagen = $imagen[0]; 
  ?>
    <div class="col-xs-12 col-md-4 seccion" style="background:url(<?php echo $ruta_imagen; ?>)">
      <div class="logoDePost <?php echo get_post_type( $post ); ?>"></div>
      <div class="pleca">
        <div class="descripcionChef" style="background:#0097fe;">
          <h1></h1>
          <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2> 
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
