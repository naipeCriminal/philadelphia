<?php get_header(); ?>
<?php 
global $post;

//Routing [use:PAGENAME]
$template = getContentTemplate($post);

print $template;

if( $template !=""){
  include_once($template);
}else{
  //Wordpress default route
  include_once("pages/default.php");
}
?>
<?php get_footer(); ?>