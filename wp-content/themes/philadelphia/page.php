<?php get_header(); ?>
<?php 
//Routing
if ( is_front_page()) { 
  include_once("pages/front.php");
}else if(is_page(447)){
  include_once("pages/innovation_center.php");
}else if(is_page(469)){
  include_once("pages/noticias.php");
}else if(is_page(299)){
  include_once("pages/chefs.php");
}else if(is_page(381)){
  include_once("pages/recetas.php");
}else if(is_page(301)){
  include_once("pages/queEs.php");
}else{
	//Wordpress default route
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; else: ?>
	<h2>No encontrado</h2>
	<p>Lo sentimos, intente utilizar nuestro formulario de b&uacute;squedas.</p>
	<?php endif; 
}
?>
<?php get_footer(); ?>