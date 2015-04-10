<?php 
	get_header();
?>
taxonomy	
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">
  <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
    <?php the_title(); ?>
    </a></h2>
  <?php the_conetent(); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php 
	get_footer();
?>	
