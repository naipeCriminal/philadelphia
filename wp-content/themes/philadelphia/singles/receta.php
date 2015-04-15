
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="safe-container templateReceta">
  <div class="row receta">
    <div class="col-md-3">
      <a href="?page_id=381" id="btn-regresar-recetas">
        <button class="btn form-control btn-default text-left" >Regresar a recetas</button>
      </a>
    </div>
    <div class="col-md-6 text-center">
      <h1 class="bemio" id="title-header-recipes-tips">Recetas <span class="bjack">y Tips</span></h1></div>
      <div class="col-md-3">
        <button class="btn form-control btn-info text-right" id="btn-regresar-resultados">Regresar a Resultados</button>
      </div>
      <div class="col-xs-12 col-md-12 reset-padding">
        <div id="container-caracteristicas">
          <ul>
            <li>
              <img src="wp-content/themes/philadelphia/assets/img/recetas-tiempo.jpg" />
              <p><?php echo( types_render_field("tiempo-de-horneado",array('row'=>true))); ?></p>
            </li>
            <li>
              <img src="wp-content/themes/philadelphia/assets/img/recetas-tiempo-dehorneado.jpg" />
              <p><?php echo( types_render_field("tiempo-de-preparacion",array('row'=>true))); ?></p>
            </li>
            <li>
              <img src="wp-content/themes/philadelphia/assets/img/recetas-rinde.jpg" />
              <p><?php echo( types_render_field("porciones",array('row'=>true))); ?></p>
            </li>
            <li>
              <img src="wp-content/themes/philadelphia/assets/img/recetas-categoria.jpg" />
              <p><?php echo( types_render_field("categoria",array('row'=>true))); ?></p>
            </li>
            <li>
              <img src="wp-content/themes/philadelphia/assets/img/recetas-tiempo-refrigeracion.jpg" />
              <p><?php echo( types_render_field("tiempo-de-refrigeracion",array('row'=>true))); ?></p>
            </li>
          </ul>

        </div>
        <?php global $post;$thumbID = get_post_thumbnail_id( $post->ID );$imgDestacada = wp_get_attachment_url( $thumbID );?>
        <div class="imagen" style="background-image:url(<?php echo $imgDestacada; ?>);">
          <img src="<?php echo $imgDestacada; ?>" alt="<?php the_title(); ?>" class="img-hidden"/>
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
            <button class="btn form-control btn-info btn-imprimir">Imprimir</button>
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
              <td><?php echo $child_post->fields['orden-pasos']; ?> </td>
              <td><?php echo $child_post->fields['glosario']; ?> </td>
              <td><?php echo $child_post->fields['instrucion-pasos']; ?> </td>
            </tr>
            <?php
            }
            ?>

            </tbody>
          </table>
        </div>
      <?php endwhile; else: endif; ?>
      <?php global $post; if( getCantTipsReceta($post->ID) > 0){ ?>
      <div class="col-xs-12 col-md-6 reset-padding">
        <button class="btn form-control btn-info bjack btn-bjack" id="btn-ver-tips-receta">Ver tips de esta receta</button>
      </div>
      <?php } ?>
      <div class="col-xs-12 col-md-6 reset-padding">
        <button class="btn form-control btn-facebook share-facebook"  data-fbname='<?php the_title(); ?>' data-fbcaption='<?php the_title(); ?>' data-fbdescription='Philadelphia® Food Service tiene para ti la receta de <?php the_title(); ?>, preparada por los Chefs de nuestro Centro Gastronómico' data-fbpicture='<?php echo $imgDestacada; ?>'>Compartir en facebook</button>
      </div>
      </div>
    </div>
  </div>
