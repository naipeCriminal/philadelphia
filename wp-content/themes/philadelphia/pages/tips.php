<?php
/*
Template Name Posts: TipsDeLasRecetas
*/
?>
<?php get_header(); ?> 
  <div class="container tipRecetaa">
    <div class="row">
      <div class="col-md-4" style="padding:0px;"><button style="width:100%; padding:10px;">REGRESAR A TIPS</button></div>
      <div class="col-md-4">RECETAS Y TIPS</div>
      <div class="col-md-4" style="padding:0px;"><button style="width:100%; padding:10px;">REGRESAR A RESULTADOS DE PANADERIA</button></div>
      <div class="col-md-12" style="background:#0097fe;  color: #fff;text-align: center;">
        <h2 class="bjack">Tip Philadelphia</h2>
        <h1><?php the_title(); ?></h1>
      </div>
      <div class="col-md-12" style="  padding: 0px;">
        <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); {?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <?php $i=0; $child_posts = types_child_posts('pasos-para-subir'); foreach ($child_posts as $child_post) { ?>

            <div style="background:url(<?php echo $child_post->fields['imagen-con-pasos'] ?>); width: 100%;height: 450px;background-size: cover; background-position: center center;" class="item <?php if($i==0){echo("active");$i=$i+1;} ?> " style="background:#000;padding-rig">
              <div class="row" style="padding:15px;background:#0097fe; margin-left: 0px;    border-right-style: none;border-left-style: none;border:#fff 3px solid;">
                <div class="col-xs-2 col-md-2 bemio" style="text-align: center; color:#014282;"><?php echo $child_post->fields['de-paso'] ?></div><div class="col-xs-12 col-md-10" style="color:#fff"><?php echo $child_post->fields['paso'] ?></div>
                
                
              </div>
            </div>
            <?php } ?>
                  <?php } ?>
              <?php $count++; // Increase the count by 1 ?>   
              <?php endwhile; ?>  

          </div>         
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div> <!-- Carousel -->


      </div>
    </div>    
  </div>
      <?php endif;// END the Wordpress Loop ?>
      <?php wp_reset_query(); // Reset the Query Loop?>
    </div>    
  </div>

  </div>
</div>
<?php get_footer(); ?>



