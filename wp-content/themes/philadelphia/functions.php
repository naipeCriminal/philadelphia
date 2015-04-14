<?php 
if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'rec_view_preview', 435, 272, true );
    add_image_size( 'tip_receta',380,380,true);
?>
<?php 
// mostrar barra administracion|
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Hooks the WP cpt_post_types filter 
 *
 * @param array $post_types An array of post type names that the templates be used by
 * @return array The array of post type names that the templates be used by
 **/

function my_cpt_post_types( $post_types ) {
    $post_types[] = 'receta';
    $post_types[] = 'tip-para-subir';
    return $post_types;
}
add_filter( 'cpt_post_types', 'my_cpt_post_types' );
?>

<?php 
function get_child_pages() {
    global $post;
    $query = new WP_Query( array( 'recetas' => $post->ID ) );

    if ( $query->have_posts() ) {
        echo '<ul>';
    while ( $query->have_posts() ) {
        $query->the_post();
            //Child pages
            echo '<li>' . get_the_title() . '</li>';
    }
        echo '</ul>';
    } else {
     echo 'Sorry, No posts found.';
    wp_reset_postdata();
}
}
 ?>

<?php
function cr(&$fields, &$errors) {
  
  // Check args and replace if necessary
  if (!is_array($fields))     $fields = array();
  if (!is_wp_error($errors))  $errors = new WP_Error;
  
  // Check for form submit
  if (isset($_POST['submit'])) {
    
    // Get fields from submitted form
    $fields = cr_get_fields();
    
    // Validate fields and produce errors
    if (cr_validate($fields, $errors)) {
      
      // If successful, register user
      wp_insert_user($fields);
      
      // And display a message
      echo 'Registration complete. Goto <a href="' . get_site_url() . '/wp-login.php">login page</a>.';
      
      // Clear field data
      $fields = array(); 
    }
  }
  
  // Santitize fields
  cr_sanitize($fields);

  // Generate form
  cr_display_form($fields, $errors);
}

function cr_sanitize(&$fields) {
  $fields['user_login']   =  isset($fields['user_login'])  ? sanitize_user($fields['user_login']) : '';
  $fields['user_pass']    =  isset($fields['user_pass'])   ? esc_attr($fields['user_pass']) : '';
  $fields['user_email']   =  isset($fields['user_email'])  ? sanitize_email($fields['user_email']) : '';
  $fields['nombre']     =  isset($fields['nombre'])    ? sanitize_text_field($fields['nombre']) : '';
  $fields['apaterno']   =  isset($fields['apaterno'])  ? sanitize_text_field($fields['apaterno']) : '';
  $fields['amaterno']    =  isset($fields['amaterno'])   ? sanitize_text_field($fields['amaterno']) : '';
  $fields['tutitulo']     =  isset($fields['tutitulo'])    ? sanitize_text_field($fields['tutitulo']) : '';
  $fields['etrabajas']  =  isset($fields['etrabajas']) ? sanitize_text_field($fields['etrabajas']) : '';
  $fields['rolempresa']     =  isset($fields['rolempresa'])    ? sanitize_text_field($fields['rolempresa']) : '';
  $fields['tipoempresa']     =  isset($fields['tipoempresa'])    ? sanitize_text_field($fields['tipoempresa']) : '';
  $fields['dirempresa1']     =  isset($fields['dirempresa1'])    ? sanitize_text_field($fields['dirempresa1']) : '';
  $fields['dirempresa2']     =  isset($fields['dirempresa2'])    ? sanitize_text_field($fields['dirempresa2']) : '';
  $fields['ciudad']     =  isset($fields['ciudad'])    ? sanitize_text_field($fields['ciudad']) : '';
  $fields['estado']     =  isset($fields['estado'])    ? sanitize_text_field($fields['estado']) : '';
  $fields['cp']     =  isset($fields['cp'])    ? sanitize_text_field($fields['cp']) : '';
}

function cr_display_form($fields = array(), $errors = null) {
  
  // Check for wp error obj and see if it has any errors  
  if (is_wp_error($errors) && count($errors->get_error_messages()) > 0) {
    
    // Display errors
    ?><ul><?php
    foreach ($errors->get_error_messages() as $key => $val) {
      ?><li>
        <?php echo $val; ?>
      </li><?php
    }
    ?></ul><?php
  }
  
  // Disaply form
  
  ?>

<div class="container">
  <div class="row">
    <div class="col-md-4">

<form name="loginform" id="loginform" action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
    <p>
        <label>Username<br />
        <input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
    </p>
    <p>
        <label>Password<br />
        <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
    </p>
    <p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Remember Me</label></p>
    <p class="submit">
        <input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Log In" tabindex="100" />
        <input type="hidden" name="redirect_to" value="<?php echo get_option('home'); ?>/index.php" />
        <input type="hidden" name="testcookie" value="1" />
    </p>
</form>


    </div>
    <div class="col-md-8" style="background:url('wp-content/themes/philadelphia/assets/img/');background-size: cover; background-position: center center;"></div>
    <div class="col-md-4" style="background:url('wp-content/themes/philadelphia/assets/img/');background-size: cover; background-position: center center;"></div>
    <div class="col-md-8">
    <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
      <div class="col-md-12">
        <div class="col-md-6">
            <h1 class="bemio" style="color: #1a477e;text-align: center;font-size: 35px;">DATOS D ETU CUENTA</h1>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="USUARIO*"  name="user_login" value="<?php echo (isset($fields['user_login']) ? $fields['user_login'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="CORREO*" name="user_email" value="<?php echo (isset($fields['user_email']) ? $fields['user_email'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="CONTRASEÑA*" name="user_pass">
            </div>
            <h1 class="bemio" style="color: #1a477e;text-align: center;font-size: 35px;">CUÉNTANOS DE TI</h1>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="NOMBRE" name="nombre" value="<?php echo (isset($fields['nombre']) ? $fields['nombre'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="APELLIDO PATERNO" name="apaterno" value="<?php echo (isset($fields['apaterno']) ? $fields['apaterno'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="APELLIDO MATERNO" name="amaterno" value="<?php echo (isset($fields['amaterno']) ? $fields['amaterno'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="TU TÍTULO" name="tutitulo" value="<?php echo (isset($fields['tutitulo']) ? $fields['tutitulo'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="EMPRESA EN LA QUE TRABAJASESCUELA DONDE ESTUDIAS*" name="etrabajas" value="<?php echo (isset($fields['etrabajas']) ? $fields['etrabajas'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="¿CUAL ES TU ROL EN LA EMPRESA?*" name="rolempresa" value="<?php echo (isset($fields['rolempresa']) ? $fields['rolempresa'] : '') ?>">
            </div>            
        </div>
        <div class="col-md-6">
            <h1 class="bemio" style="color: #1a477e;text-align: center;font-size: 35px;">CUÉNTANOS DE <br>TU EMPRESA</h1>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="TIPO DE EMPRESA" name="tipoempresa" value="<?php echo (isset($fields['tipoempresa']) ? $fields['tipoempresa'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="DIRECCIÓN DE LA EMPRESA 1*" name="dirempresa1" value="<?php echo (isset($fields['dirempresa1']) ? $fields['dirempresa1'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="DIRECCIÓN DE LA EMPRESA 2" name="dirempresa2" value="<?php echo (isset($fields['dirempresa2']) ? $fields['dirempresa2'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="CIUDAD*" name="ciudad" value="<?php echo (isset($fields['ciudad']) ? $fields['ciudad'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="ESTADO*" name="estado" value="<?php echo (isset($fields['estado']) ? $fields['estado'] : '') ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="CODIGO POSTAL" name="cp" value="<?php echo (isset($fields['cp']) ? $fields['cp'] : '') ?>">
            </div>
            <input type="submit" name="submit" value="Register">            
        </div>   

          

      </div>
    </form>

      
    </div>
  </div>
</div>

<?php
}

function cr_get_fields() {
  return array(
    'user_login'   =>  isset($_POST['user_login'])   ?  $_POST['user_login']   :  '',
    'user_pass'    =>  isset($_POST['user_pass'])    ?  $_POST['user_pass']    :  '',
    'user_email'   =>  isset($_POST['user_email'])   ?  $_POST['user_email']        :  '',
    'nombre'     =>  isset($_POST['nombre'])     ?  $_POST['nombre']     :  '',
    'apaterno'   =>  isset($_POST['apaterno'])   ?  $_POST['apaterno']        :  '',
    'amaterno'    =>  isset($_POST['amaterno'])    ?  $_POST['amaterno']        :  '',
    'tutitulo'     =>  isset($_POST['tutitulo'])     ?  $_POST['tutitulo']     :  '',
    'etrabajas'  =>  isset($_POST['etrabajas'])  ?  $_POST['etrabajas']  :  '',
    'rolempresa'     =>  isset($_POST['rolempresa'])     ?  $_POST['rolempresa']     :  '',
    'tipoempresa'     =>  isset($_POST['tipoempresa'])     ?  $_POST['tipoempresa']     :  '',
    'dirempresa1'     =>  isset($_POST['dirempresa1'])     ?  $_POST['dirempresa1']     :  '',
    'dirempresa2'     =>  isset($_POST['dirempresa2'])     ?  $_POST['dirempresa2']     :  '',
    'ciudad'     =>  isset($_POST['ciudad'])     ?  $_POST['ciudad']     :  '',
    'estado'     =>  isset($_POST['estado'])     ?  $_POST['estado']     :  '',
    'cp'     =>  isset($_POST['cp'])     ?  $_POST['cp']     :  ''
  );
}

function cr_validate(&$fields, &$errors) {
  // Make sure there is a proper wp error obj
  // If not, make one
  if (!is_wp_error($errors))  $errors = new WP_Error;
  // Validate form data
  if (empty($fields['user_login']) || empty($fields['user_pass']) || empty($fields['user_email'])) {
    $errors->add('field', 'Required form field is missing');
  }
  if (strlen($fields['user_login']) < 4) {
    $errors->add('username_length', 'Username too short. At least 4 characters is required');
  }
  if (username_exists($fields['user_login']))
    $errors->add('user_name', 'Sorry, that username already exists!');
  if (!validate_username($fields['user_login'])) {
    $errors->add('username_invalid', 'Sorry, the username you entered is not valid');
  }
  if (strlen($fields['user_pass']) < 5) {
    $errors->add('user_pass', 'Password length must be greater than 5');
  }
  if (!is_email($fields['user_email'])) {
    $errors->add('email_invalid', 'Email is not valid');
  }
  if (email_exists($fields['user_email'])) {
    $errors->add('email', 'Email Already in use');
  }
  // If errors were produced, fail
  if (count($errors->get_error_messages()) > 0) {
    return false;
  }
  // Else, success!
  return true;
}
///////////////
// SHORTCODE //
///////////////
// The callback function for the [cr] shortcode
function cr_cb() {
  $fields = array();
  $errors = new WP_Error();
  
  // Buffer output
  ob_start();
  
  // Custom registration, go!
  cr($fields, $errors);
  
  // Return buffer
  return ob_get_clean();
}
add_shortcode('cr', 'cr_cb');
?>

