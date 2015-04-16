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

<div class="safe-container">
  <div class="row">
    <div id="header-tips-recipes" class="col-md-12">
      <div class="table">
        <div class="cell-center">
          <span class="bemio uppercase">Tips de la receta </span><span class="bjack"> </span>
        </div>
      </div>
    </div>
  </div>
  <div class="row ourHolder">
    <?php
    //Start the Loop
    //$values=array('0');
    //if ( is_user_logged_in() ) $values=array('0','1');
    //$wpbp = new WP_Query(array( 'post_type' => array( 'receta', 'tips'),'meta_query'=>array(array('key'=>'wpcf-premium','value'=>$values,'compare'=>'IN')) , 'category__in' => $cats, 'posts_per_page' => '-1', 'paged' => $paged) );
    $wpbp = new WP_Query(array( 'post_type' => array('tip-philadelphia'),'category__in' => $cats, 'posts_per_page' => '-1', 'paged' => $paged) );
    if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post();
    // Ruta de la imagen destacada (tamaño completo)
    global $post;
    $thumbID = get_post_thumbnail_id( $post->ID );
    $imgDestacada = wp_get_attachment_url( $thumbID );
    $premium = get_post_meta( $post->ID, 'wpcf-premium', true );
    $types = get_the_category( get_the_ID(), $FPF_categories);
    $posType= get_post_type( $post );
    if ( is_user_logged_in() || (!is_user_logged_in() && !$premium) ){
    ?>
    <div class="col-xs-12 col-md-4 square-recipe" data-id="id-<?php echo $count; ?>" data-type="<?php foreach ($types as $type) { echo $type->slug. ' '; }?>">
      <div class="view">
        <div class="thumbnail" style="background-image: url(<?php echo($imgDestacada); ?>)">
          <?php if ($premium==true) { echo('<div class="premium"></div>');} ?>
          
          <div class="<?php if ($posType=='tip-philadelphia') {echo 'tip-title';}else{echo 'recipe-title';} ?>">
            <div class="table">
              <div class="cell-center">
                <a href="<?php the_permalink(); ?>?type=<?php foreach ($types as $type) { echo $type->slug. ' '; }?>" title="<?php the_title_attribute(); ?>" ><?php echo get_the_title(); ?></a>
              </div>
            </div>
          </div>
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