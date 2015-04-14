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
    <div class="col-md-3">
      <a href="?page_id=381">
        <button class="btn form-control btn-default text-left">Regresar a recetas</button>
      </a>
    </div>
    <div class="col-md-6 text-center">
      <h1 class="bemio">Recetas <span class="bjack">y Tips</span></h1></div>
      <div class="col-md-3">
        <button class="btn form-control btn-info text-right">Regresar a Resultadosd </button>
      </div>
      <div class="col-xs-12 col-md-12 reset-padding">
        <div id="container-caracteristicas">
          <div class="caracteristica" style="background-image:url('wp-content/themes/philadelphia/assets/img/recetas-tiempo.jpg');">
            <h4><?php echo( types_render_field("tiempo-de-preparacion",array('row'=>true))); ?></h4>
          </div>
          <div class="caracteristica" style="background-image:url('wp-content/themes/philadelphia/assets/img/recetas-tiempo-dehorneado.jpg');">
            <h4><?php echo( types_render_field("tiempo-de-horneado",array('row'=>true))); ?> </h4>
          </div>
          <div class="caracteristica" style="background-image:url('wp-content/themes/philadelphia/assets/img/recetas-rinde.jpg');">
            <h4><?php echo( types_render_field("porciones",array('row'=>true))); ?></h4>
          </div>
          <div class="caracteristica" style="background-image:url('wp-content/themes/philadelphia/assets/img/recetas-categoria.jpg');">
            <h4><?php echo( types_render_field("tiempo-de-horneado",array('row'=>true))); ?></h4>
          </div>
        </div>
        <?php global $post;$thumbID = get_post_thumbnail_id( $post->ID );$imgDestacada = wp_get_attachment_url( $thumbID );?>
        <div class="imagen" style="background-image:url(<?php echo $imgDestacada; ?>);">
          <div class="logoPhiladelphia"></div>
        </div>
      </div>
      <div class="col-md-12" style="border:1px #fff solid;background:#014282;">
        <h1 class="bemio tituloWhite text-center"><?php the_title(); ?></h1>
      </div>
      <div id="container-receta">
        <div class="col-xs-12 col-md-6 reset-padding" style="border:1px gray solid;background:#014282;" >
          <h1 class="bemio tituloWhite text-center">Ingredientes</h1>
          <table class="table" id="table-tip-recipe">
            <!-- <thead>
              <tr>
                <td>Cantidad</td>
                <td>Nombre</td>
              </tr>
            </thead> -->
            <tbody>
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
            </tbody>
          </table>
          <div class="col-xs-12 col-md-12 reset-padding">
            <button class="btn form-control btn-info">Versión para imprimir.</button>
          </div>
        </div>
        <div class="col-xs-12 col-md-6" style="border:1px #fff solid;background:#014282;">
          <h1 class="bemio tituloWhite text-center">Modo de preparación</h1>
          <table class="table" id="table-preparacion">
            <!-- <thead>
              <tr>
                <td>#</td>
                <td>paso</td>
              </tr>
            </thead> -->
            <tbody>
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
            </tbody>
          </table>
        </div>
      <?php endwhile; else: endif; ?>
      <div class="col-xs-12 col-md-6 reset-padding">
        <button class="btn form-control btn-info bjack btn-bjack">Ver tips de esta receta</button>
      </div>
      <div class="col-xs-12 col-md-6 reset-padding">
        <button onClick="FB.ui({method: 'share', href: 'http://www.developercatorcedias.com/foodservice/site/?', });" class="btn form-control btn-facebook">Compartir en facebook</button>
      </div>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>