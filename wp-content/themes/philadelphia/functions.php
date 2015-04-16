<?php
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );
add_image_size( 'rec_view_preview', 435, 272, true );
add_image_size( 'tip_receta',380,380,true);
?>
<?php
// mostrar barra administracion|
add_filter( 'show_admin_bar', '__return_false' );
//personalizar logout
add_action('wp_logout',create_function('','wp_redirect(home_url());exit();'));
/**
* Hooks the WP cpt_post_types filter
*
* @param array $post_types An array of post type names that the templates be used by
* @return array The array of post type names that the templates be used by
**/
function my_cpt_post_types( $post_types ) {
$post_types[] = 'receta';
$post_types[] = 'tip-philadelphia';
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
      $errors->add('field','¡El registro se ha completado con éxito!');

      // Clear field data
      $fields = array();
      exit;      
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
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h1 class="bemio" style="color: #004a80;">FOOD SERVICE: ¡DALE MÁS SABOR A TU NEGOCIO!</h1>
    </div>
  </div>
</div>
  <?php
//Errores del formulario de registro
// Check for wp error obj and see if it has any errors
if (is_wp_error($errors) && count($errors->get_error_messages()) > 0) {
// Display errors
?>
<div class="safe-container" id="container-registro-login">
<div class="alert alert-danger">
  <ul><?php
    foreach ($errors->get_error_messages() as $key => $val) {
    ?><li>
      <?php echo $val; ?>
    </li><?php
    }
  ?></ul>
</div>
</div>

<?php
}
// Disaply form

//errores del formulario de login
$page_showing = basename($_SERVER['REQUEST_URI']);
if (strpos($page_showing, 'failed') !== false) {
echo '<ul><li>Nombre de usuario o contraseña inválidos.</li></ul>';
}
elseif (strpos($page_showing, 'blank') !== false ) {
echo '<ul><li>Los campos no pueden ser vacios.</li></ul>';
}

?>


    <div id="container-login-form">
      <div class="col-md-4 text-center">
        <form name="loginform" id="loginform" action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
          <h1 class="bjack">Ingresa a</h1>
          <h1 class="upercase bemio">Tu cuenta</h1>
          <div class="table">
            <div class="cell-center text-left">
              <p><input type="text" name="log" id="user_login" class="form-control" value="" size="20" tabindex="10" placeholder="USUARIO O CORREO*"/></p>
              <p><input type="password" name="pwd" id="user_pass" class="form-control" value="" size="20" tabindex="20"  placeholder="CONTRASEÑA*"/></p>
              <p class="submit text-right">
                <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-default" value="Ingresar" tabindex="100" />
                <input type="hidden" name="redirect_to" value="<?php echo get_option('home'); ?>/index.php" />
                <input type="hidden" name="testcookie" value="1" />
              </p>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-8 reset-padding">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/food-service-login-top.jpg" alt="" width="100%">
      </div>
    </div>
    <div id="container-registro">
      <div class="col-md-4 reset-padding">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/food-service-login-bottom.jpg" alt="" width="100%">
      </div>
      <div class="col-md-8 text-center">
        <form action="<?php bloginfo('url'); ?>/registro" method="post">
          <h1 class="bjack">Crea</h1>
          <h1 class="upercase bemio">Tu cuenta</h1>
          <p>
            <h1 class="bjack">¡Regístrate y obtén varios beneficios!</h1><br>
          </p>
          <div class="col-md-12">
            <div class="col-md-6">
              <h1 class="bemio">DATOS DE TU CUENTA</h1>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="USUARIO*"  name="user_login" value="<?php echo (isset($fields['user_login']) ? $fields['user_login'] : '') ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="CORREO*" name="user_email" value="<?php echo (isset($fields['user_email']) ? $fields['user_email'] : '') ?>">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="CONTRASEÑA*" name="user_pass">
              </div>
              <h1 class="bemio">CUÉNTANOS DE TI</h1>
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
              <h1 class="bemio">CUÉNTANOS DE <br>TU EMPRESA</h1>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="TIPO DE EMPRESA" name="tipoempresa" value="<?php echo (isset($fields['tipoempresa']) ? $fields['tipoempresa'] : '') ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="DIRECCIÓN DE LA EMPRESA 1" name="dirempresa1" value="<?php echo (isset($fields['dirempresa1']) ? $fields['dirempresa1'] : '') ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="DIRECCIÓN DE LA EMPRESA 2" name="dirempresa2" value="<?php echo (isset($fields['dirempresa2']) ? $fields['dirempresa2'] : '') ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="CIUDAD" name="ciudad" value="<?php echo (isset($fields['ciudad']) ? $fields['ciudad'] : '') ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ESTADO" name="estado" value="<?php echo (isset($fields['estado']) ? $fields['estado'] : '') ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="CODIGO POSTAL" name="cp" value="<?php echo (isset($fields['cp']) ? $fields['cp'] : '') ?>">
              </div>
              <input type="submit" name="submit" value="Terminar Registro" class="btn btn-info float-right">
            </div>
            
          </div>
        </form>
        
      </div>
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
$errors->add('field', 'Los campos requeridos no pueden ser vacios.');
}
if (strlen($fields['user_login']) < 4) {
$errors->add('username_length', 'Nombre de usuario muy corto. Debe contener al menos 4 caracteres.');
}
if (username_exists($fields['user_login']))
$errors->add('user_name', 'El nombre de usuario ya existe');
if (!validate_username($fields['user_login'])) {
$errors->add('username_invalid', 'El nombre de usuario no es válido');
}
if (strlen($fields['user_pass']) < 5) {
$errors->add('user_pass', 'La contraseña debe tener mas de 5 caracteres.');
}
if (!is_email($fields['user_email'])) {
$errors->add('email_invalid', 'El correo no es válido.');
}
if (email_exists($fields['user_email'])) {
$errors->add('email', 'El correo ya existe.');
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


//CUSTOM FUNCTIONS PHILY
function getCantTipsReceta( $nid ){
  //Devuelve la cantidad de tips de la receta
  global $wpdb;
  $query = "SELECT count(*) FROM wp_posts as p, wp_postmeta as pm WHERE p.ID = pm.post_id AND p.post_type ='receta-tip' AND pm.meta_key='_wpcf_belongs_receta_id' AND pm.meta_value = ".$nid;
  return $wpdb->get_var( $query);
}

function getContentTemplate( $post ){
  //REFACTORIZAR CON EXPRESIONES REGULARES :-D
  $posi = strpos($post->post_content,"[use:");
  if($posi > -1){
    $posi+=5;
    $posf = strpos($post->post_content,"\]", $posi)-1;
    return substr($post->post_content,$posi,$posf );
  }else{
    return "";
  }
}

//Cambiando las redirecciones del formulario de login
$page_id = "";
$product_pages_args = array(
'meta_key' => '_wp_page_template',
'meta_value' => 'login.php'
);

$product_pages = get_pages( $product_pages_args );
foreach ( $product_pages as $product_page ) {
$page_id.= $product_page->ID;
}
function login_failed() {
  global $page_id;
  wp_redirect( get_bloginfo('url').'/registro?login=failed' );
  exit;
}
add_action( 'wp_login_failed', 'login_failed' );

function blank_username_password( $user, $username, $password ) {
  global $page_id;
  if( $username == "" || $password == "" ) {
    wp_redirect( get_bloginfo('url').'/registro?login=blank' );
    exit;
  }
}
add_filter( 'authenticate', 'blank_username_password', 1, 3);

function logout_page() {
  global $page_id;
  wp_redirect( home_url( '/' ) . "&login=false" );
  exit;
}
add_action('wp_logout', 'logout_page');



?>

