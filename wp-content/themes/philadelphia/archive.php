<?php 
	get_header();
?>
archive
<ul>
	archive
<?php  
	$args=array('post_type' => 'receta'); 
	$query = new WP_Query($args);
	while($query->have_posts()) : $query -> the_post();
	?>
<li><h2><?php the_title(); ?></h2></li>
<?php 
#	echo( types_render_field("name", array('row' => true)));
#	echo( types_render_field( "jefe-directo", array('row' => true)));
?>
<?php
#	if ( has_post_thumbnail() ) {
#		the_post_thumbnail('portada-thumb');
#	}?>
<?php endwhile; ?> 
</ul>
<?php 
	get_footer();
?>	
