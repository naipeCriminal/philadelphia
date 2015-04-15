<?php get_header(); ?> 

  <?php 
  global $post;
   
  if( $post->post_type == "cobertura-de-cursos" ||  
      $post->post_type == "sweet-report" || 
      $post->post_type == "cocina-salud" ||
      $post->post_type == "cobertura-de-cursos" ||
      $post->post_type == "new-and-tasty" ||
      $post->post_type == "el-ingrediente-hot" ||
      $post->post_type == "philly-trends" ||
      $post->post_type == "sweet-reports" ||
      $post->post_type == "philly-lab"){
    include("singles/innovation.php");
  }else if( $post->post_type == "noticia" ){
    include("singles/noticia.php");
   }else if( $post->post_type == "receta" ){
    include("singles/receta.php");
  }else{
    include("singles/default.php");
  } 
  ?>

<?php get_footer(); ?>