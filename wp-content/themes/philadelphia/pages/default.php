  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
  <?php endwhile; else: ?>
  <h2>No encontrado</h2>
  <p>Lo sentimos, intente utilizar nuestro formulario de b&uacute;squedas.</p>
  <?php endif; 