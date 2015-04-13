<?php
//Enable Pagination   
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

//Pass the Selected Categories to the Loop
$categories = get_option('jqs_select_categories');
$cats = array(); 
foreach ($categories as $category) {
$term = get_term_by ('name',$category,'category'); 
$cats[] = $term->term_id;
}

?>

<!-- esto se puede borrar -->

<div class="container">
<div class="row ourHolder">
  <?php
      //Start the Loop 
      //$values=array('0');
      //if ( is_user_logged_in() ) $values=array('0','1');
      //$wpbp = new WP_Query(array( 'post_type' => array( 'receta', 'tips'),'meta_query'=>array(array('key'=>'wpcf-premium','value'=>$values,'compare'=>'IN')) , 'category__in' => $cats, 'posts_per_page' => '-1', 'paged' => $paged) ); 
      $wpbp = new WP_Query(array( 'post_type' => array( 'receta', 'tips'),'category__in' => $cats, 'posts_per_page' => '-1', 'paged' => $paged) ); 

      if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post();
      // Ruta de la imagen destacada (tamaño completo)
      global $post;
      $thumbID = get_post_thumbnail_id( $post->ID );
      $imgDestacada = wp_get_attachment_url( $thumbID );
      $premium = get_post_meta( $post->ID, 'wpcf-premium', true );
      $types = get_the_category( get_the_ID(), $FPF_categories); 
      if ( is_user_logged_in() || (!is_user_logged_in() && !$premium) ){
      ?>

<div class="col-xs-12 col-md-4" id="item"  style="background: url(<?php echo($imgDestacada); ?>);height: 350px;background-size: cover;background-position: center center !important;" data-id="id-<?php echo $count; ?>" data-type="<?php foreach ($types as $type) { echo $type->slug. ' '; }?>">
  <div class="pleca ">
    <div class="descripcion">
      <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php echo get_the_title(); ?></a></h1>
      <h2></h2>
    </div>
  </div>
</div>


      <?php } ?>
      <?php $count++; // Increase the count by 1 ?>   
      <?php endwhile; ?>  

      <?php endif;// END the Wordpress Loop ?>
      <?php wp_reset_query(); // Reset the Query Loop?>
    

    </div>

  </div>
</div>

