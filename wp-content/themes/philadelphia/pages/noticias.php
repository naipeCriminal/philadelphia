<div class="container ">
  <div class="row pic">
    <h1 class="bemio">NOTICIAS</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium reiciendis minus quaerat veniam alias rem consequatur repellat dolore odio accusamus, nisi officiis, maxime enim, hic expedita. Dolorum quos nemo veritatis.</p>
  <?php
  $args = array('showposts'=>-1,  'post_type'=>'noticia');
  $query = new WP_Query($args);
   if ( have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

    <div class="col-xs-12 col-md-4 seccion" style="background:url(<?php echo bloginfo('template_url'); ?>/assets/img/centro_gastronomico_chefs-karlaferrer.jpg)">
      <div class="pleca">
        <div class="descripcionChef" style="background:#0097fe;">
          <h1>NOTICIA </h1>
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
