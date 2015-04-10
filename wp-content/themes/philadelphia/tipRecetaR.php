<?php
/*
Template Name Posts: tipsRecetas
*/
?>
<?php 
	get_header();
?>
tipsRecetas
  
    
    
  
<?php

$args = array( 'post_type' => array( 'receta', 'ing'), 'depth' => 1, 'orderby' => 'rand', 'post_status' => 'publish', 'post_parent' => 0, 'posts_per_page'=>'-1');
$wp_query = new WP_Query($args);
    ?>
    <div  class="row">
    <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>

<?php 
// Ruta de la imagen destacada (tamaño completo)
global $post;
$thumbID = get_post_thumbnail_id( $post->ID );
$imgDestacada = wp_get_attachment_url( $thumbID );
?>



<div class="tip_receta col-md-2" style="background: url('<?php echo $imgDestacada; ?>') no-repeat center center;">
  <div class="premium"></div>
  <div class="dentro">
<?php  
if(get_post_type( $post ) =="receta"){
?>
<div class="titulo"><h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1></div>
<?php
}else{
?>
<div class="tituloTip"><h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1></div>
<?php
}
?>
    
  </div>
</div>             


      <?php endwhile; else: ?>
        <p>Oops, something has gone wrong. No cities currently available.</p>
        <?php wp_reset_postdata(); // reset the query ?>
    </div>
      <?php endif; ?>  
      
        <?php get_footer(); ?>