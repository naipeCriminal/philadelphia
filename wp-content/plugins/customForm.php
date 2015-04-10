<?php 
/*
  Plugin Name: Custom Registration
  Plugin URI: http://code.tutsplus.com
  Description: Updates user rating based on number of posts.
  Version: 1.0
  Author: Agbonghama Collins
  Author URI: http://tech4sky.com
 */

 function registration_form( $correo, $contrasena,$contrasena2, $nombres, $apaterno, $amaterno, $tutitulo, $etrabajas, $rollempresa,$tipoempresa,$dirempresa,$dirempresa2,$ciudad,$estado,$cp ) {
    echo '
    <style>
    div {
        margin-bottom:2px;
    }
     
    input{
        margin-bottom:4px;
    }
    </style>
    ';
 
    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
    <div class="form-group">
    <input type="text" name="correo" value="' . ( isset( $_POST['correo'] ) ? $correo : null ) . '" placeholder="CORREO*">
    </div>
     
    <div class="form-group">
    <input type="password" name="contrasena" value="' . ( isset( $_POST['contrasena'] ) ? $contrasena : null ) . '" placeholder="CONTRASEÑA*">
    </div>

    <div class="form-group">
    <input type="password" name="contrasena" value="' . ( isset( $_POST['contrasena'] ) ? $contrasena : null ) . '" placeholder="CONFIRMA TU CONTRASEÑA*">
    </div>
     
    <div class="form-group">
    <input type="text" name="nombres" value="' . ( isset( $_POST['nombres']) ? $nombres : null ) . '" placeholder="NOMBRE(S)*">
    </div>
     
    <div class="form-group">
    <input type="text" name="apaterno" value="' . ( isset( $_POST['apaterno']) ? $apaterno : null ) . '" placeholder="APELLIDO PATERNO*">
    </div>
     
    <div class="form-group">
    <input type="text" name="amaterno" value="' . ( isset( $_POST['amaterno']) ? $amaterno : null ) . '" placeholder="APELLIDO MATERNO*">
    </div>
     
    <div class="form-group">
    <input type="text" name="tutitulo" value="' . ( isset( $_POST['tutitulo']) ? $tutitulo : null ) . '" placeholder="TU TÍTULO">
    </div>
     
    <div class="form-group">
    <input type="text" name="etrabajas" value="' . ( isset( $_POST['etrabajas']) ? $etrabajas : null ) . '" placeholder="EMPRESAS EN LA UE TRABAJAS ESCUELA DONDEESTUDIAS*">
    </div>
     
    <div class="form-group">
    <input type="text" name="rollempresa" value="' . ( isset( $_POST['rollempresa']) ? $rollempresa : null ) . '" placeholder="¿CUAL ES TU ROL EN LA EMPRESA?">
    </div>
}}}}
    <div class="form-group">
    <input type="text" name="tipoempresa" value="' . ( isset( $_POST['tipoempresa']) ? $tipoempresa : null ) . '" placeholder="TIPO DE EMPRESA">
    </div>

    <div class="form-group">
    <input type="text" name="dirempresa" value="' . ( isset( $_POST['dirempresa']) ? $dirempresa : null ) . '" placeholder="DIRECCIÓN DE LA EMPREA 1*">
    </div>
    
    <div class="form-group">
    <input type="text" name="dirempresa2" value="' . ( isset( $_POST['dirempresa2']) ? $dirempresa2 : null ) . '" placeholder="DIRECCIÓN DE LA EMPREA 2">
    </div>

    <div class="form-group">
    <input type="text" name="ciudad" value="' . ( isset( $_POST['ciudad']) ? $ciudad : null ) . '" placeholder="CIUDAD*">
    </div>

    <div class="form-group">
    <input type="text" name="estado" value="' . ( isset( $_POST['estado']) ? $estado : null ) . '" placeholder="ESTADO*">
    </div>
    
    <div class="form-group">
    <input type="text" name="cp" value="' . ( isset( $_POST['cp']) ? $cp : null ) . '" placeholder="CÓDIGO POSTAL*">
    </div>

    <input type="submit" name="submit" value="Register"/>
    </form>
    ';
}
function registration_validation( $correo, $contrasena,$contrasena2, $nombres, $apaterno, $amaterno, $tutitulo, $etrabajas, $rollempresa,$tipoempresa,$dirempresa,$dirempresa2,$ciudad,$estado,$cp )  {
	global $reg_errors;
	$reg_errors = new WP_Error;

	if ( empty( $password ) || empty( $email ) ) {
    $reg_errors->add('field', 'Este campo es requerido');
	}

	// if ( 4 > strlen( $correo ) ) {
	//     $reg_errors->add( 'username_length', 'El correo es demaciado corto' );
	// }
	// if ( username_exists( $correo ) ){
 //    	$reg_errors->add('user_name', 'Disculpe, el usuario ya existe');
 //    }
 //    if ( ! validate_username( $username ) ) {
 //    	$reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
	// }
	// if ( 5 > strlen( $password ) ) {
 //        $reg_errors->add( 'password', 'Password length must be greater than 5' );
 //    }
	// if ( !is_email( $email ) ) {
	//     $reg_errors->add( 'email_invalid', 'Email is not valid' );
	// }
	// if ( email_exists( $email ) ) {
	//     $reg_errors->add( 'email', 'Email Already in use' );
	// }
////////////

	if ( is_wp_error( $reg_errors ) ) {
	 
	    foreach ( $reg_errors->get_error_messages() as $error ) {
	     
	        echo '<div>';
	        echo '<strong>ERROR</strong>:';
	        echo $error . '<br/>';
	        echo '</div>';    
	    }
	}


	function complete_registration() {
	    global $correo, $contrasena,$contrasena2, $nombres, $apaterno, $amaterno, $tutitulo, $etrabajas, $rollempresa,$tipoempresa,$dirempresa,$dirempresa2,$ciudad,$estado,$cp;
	    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
	        $userdata = array(
	        'user_login'    =>   $correo,
	        'user_email'    =>   $correo,
	        'user_pass'     =>   $contrasena,
	        'nombres'       =>   $nombres,
	        'apaterno'      =>   $apaterno,
	        'amaterno'      =>   $amaterno,
	        'tutitulo'      =>   $tutitulo,
	        'etrabajas'     =>   $etrabajas,
	        'rollempresa'   =>   $rollempresa,
	        'tipoempresa'   =>   $tipoempresa,
	        'dirempresa'    =>   $dirempresa,
	        'dirempresa2'   =>   $dirempresa2,
	        'ciudad'        =>   $ciudad,
	        'estado'        =>   $estado,
	        'cp'            =>   $cp,

	        );
	        $user = wp_insert_user( $userdata );
	        echo 'Registration complete. Goto <a href="' . get_site_url() . '/wp-login.php">login page</a>.';   
	    }
	}

	function custom_registration_function() {
	    if ( isset($_POST['submit'] ) ) {
	        registration_validation(
	        $_POST['correo'],
	        $_POST['contrasena'],
	        $_POST['contrasena2'],
	        $_POST['nombres'],
	        $_POST['apaterno'],
	        $_POST['amaterno'],
	        $_POST['tutitulo'],
	        $_POST['etrabajas'],
	        $_POST['rollempresa'],
	        $_POST['tipoempresa'],
	        $_POST['dirempresa'],
	        $_POST['dirempresa2'],
	        $_POST['ciudad'],
	        $_POST['estado'],
	        $_POST['cp'],
	        );
	         
	        // sanitize user form input
	        global $correo,$contrasena,$contrasena2,$nombres,$apaterno,$amaterno,$tutitulo,$etrabajas,$rollempresa,$tipoempresa,$dirempresa,$dirempresa2,$ciudad,$estado,$cp;
	        $correo=sanitize_email( $_POST{'correo'});
	        $contrasena=sanitize_text_field( $_POST{'contrasena'});
	        $contrasena2=sanitize_text_field( $_POST{'contrasena2'});
	        $nombres=sanitize_text_field( $_POST{'nombres'});
	        $apaterno=sanitize_text_field( $_POST{'apaterno'});
	        $amaterno=sanitize_text_field( $_POST{'amaterno'});
	        $tutitulo=sanitize_text_field( $_POST{'tutitulo'});
	        $etrabajas=sanitize_text_field( $_POST{'etrabajas'});
	        $rollempresa=sanitize_text_field( $_POST{'rollempresa'});
	        $tipoempresa=sanitize_text_field( $_POST{'tipoempresa'});
	        $dirempresa=sanitize_text_field( $_POST{'dirempresa'});
	        $dirempresa2=sanitize_text_field( $_POST{'dirempresa2'});
	        $ciudad=sanitize_text_field( $_POST{'ciudad'});
	        $estado=sanitize_text_field( $_POST{'estado'});
	        $cp=sanitize_text_field( $_POST{'cp'});


	        // $username   =   sanitize_user( $_POST['username'] );
	        // $password   =   esc_attr( $_POST['password'] );
	        // $email      =   sanitize_email( $_POST['email'] );
	        // $website    =   esc_url( $_POST['website'] );
	        // $first_name =   sanitize_text_field( $_POST['fname'] );
	        // $last_name  =   sanitize_text_field( $_POST['lname'] );
	        // $nickname   =   sanitize_text_field( $_POST['nickname'] );
	        // $bio        =   esc_textarea( $_POST['bio'] );
	 
	        // call @function complete_registration to create the user
	        // only when no WP_error is found
	        complete_registration(
	        	$correo,
	        	$contrasena,
	        	$contrasena2,
	        	$nombres,
	        	$apaterno,
	        	$amaterno,
	        	$tutitulo,
	        	$etrabajas,
	        	$rollempresa,
	        	$tipoempresa,
	        	$dirempresa,
	        	$dirempresa2,
	        	$ciudad,
	        	$estado,
	        	$cp
	        );
	    }
	 
	    registration_form(
	        	$correo,
	        	$contrasena,
	        	$contrasena2,
	        	$nombres,
	        	$apaterno,
	        	$amaterno,
	        	$tutitulo,
	        	$etrabajas,
	        	$rollempresa,
	        	$tipoempresa,
	        	$dirempresa,
	        	$dirempresa2,
	        	$ciudad,
	        	$estado,
	        	$cp
	        );
	}

	// Register a new shortcode: [cr_custom_registration]
	add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
	 
	// The callback function that will replace [book]
	function custom_registration_shortcode() {
	    ob_start();
	    custom_registration_function();
	    return ob_get_clean();
	}
}

 ?>