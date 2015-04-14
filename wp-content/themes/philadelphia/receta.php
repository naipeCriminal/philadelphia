<?php
/*
Template Name Posts: receta
*/
//no borrar o de aca arriba
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="safe-container templateReceta">
  <div class="row receta">
    <div class="col-md-3"><button class="btn">dame click</button></div>
    <div class="col-md-6 text-center"><h1 class="bemio">Recetas <span class="bjack">y Tips</span></h1></div>
    <div class="col-md-3"><button class="btn">dame click</button></div>
    <div class="col-xs-12 col-md-10" style="padding:0px;">
      <?php global $post;$thumbID = get_post_thumbnail_id( $post->ID );$imgDestacada = wp_get_attachment_url( $thumbID );?>
      
      <div class="imagen" style="background:url(<?php echo $imgDestacada; ?>);background-size: cover; background-position: center center;">
        <div class="logoPhiladelphia"></div>
      </div>
    </div>
    <div class="col-xs-12 col-md-2" style="padding:0px;">
      <div class="col-xs-3 col-md-12 caracteristica" style="background:url('wp-content/themes/philadelphia/assets/img/recetas-tiempo.jpg') no-repeat;background-size: cover; background-position: center center;">
        <h4><?php echo( types_render_field("tiempo-de-preparacion",array('row'=>true))); ?></h4>
        
      </div>
      <div class="col-xs-3 col-md-12 caracteristica" style="background:url('wp-content/themes/philadelphia/assets/img/recetas-tiempo-dehorneado.jpg') no-repeat;background-size: cover; background-position: center center;">
        <h4><?php echo( types_render_field("tiempo-de-horneado",array('row'=>true))); ?> </h4>
        
      </div>
      <div class="col-xs-3 col-md-12 caracteristica" style="background:url('wp-content/themes/philadelphia/assets/img/recetas-rinde.jpg') no-repeat;background-size: cover; background-position: center center;">
        <h4><?php echo( types_render_field("porciones",array('row'=>true))); ?></h4>
        
      </div>
      <div class="col-xs-3 col-md-12 caracteristica" style="background:url('wp-content/themes/philadelphia/assets/img/recetas-categoria.jpg') no-repeat;background-size: cover; background-position: center center;">
        <h4><?php echo( types_render_field("tiempo-de-horneado",array('row'=>true))); ?></h4>
        
      </div>
    </div>
    <div class="col-md-12" style="border:1px #000 solid;background:#014282;">
      <h1 class="bemio tituloWhite"><?php the_title(); ?></h1>
    </div>
    <div class="col-xs-12 col-md-6" style="border:1px #000 solid;background:#014282;" >
      <h1 class="bemio tituloWhite">ingredientes</h1>
      <table class="table table-hover">
        <tr>
          <td>Cantidad</td>
          <td>Nombre</td>
        </tr>
        <?php
          $child_posts = types_child_posts('ing');
          foreach ($child_posts as $child_post) {
        ?>
        <tr>
          <td><?php echo $child_post->fields['cantidad'] ?></td>
          <td><?php echo $child_post->fields['nombre'] ?></td>
        </tr>
        <?php
          }
        ?>
      </table>
    </div>
    <div class="col-xs-12 col-md-6" style="border:1px #000 solid;background:#014282;">
      <h1 class="bemio tituloWhite">modo de preparación</h1>
      <table class="table table-hover">
        <tr>
          <td>#</td>
          <td>paso</td>
        </tr>
        <?php
          $child_posts = types_child_posts('paso');
          foreach ($child_posts as $child_post) {
        ?>
        <tr>
          <td><?php echo $child_posts; ?></td>
          <td><?php echo $child_post->fields['instrucion-pasos']; ?></td>
        </tr>
        <?php
          }
        ?>
      </table>
    </div>
    <?php endwhile; else: endif; ?>
    <div class="col-xs-12 col-md-6"><button>boton</button></div>
    <div class="col-xs-12 col-md-6"><button>boton</button></div>
  </div>
</div>
<?php get_footer(); ?>