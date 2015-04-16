 <?php
    global $wpdb;
    
    $error = '';
    $success = '';
    
    // check if we're in reset form
    if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] ) 
    {
      $email = trim($_POST['user_login']);
      
      if( empty( $email ) ) {
        $error = 'Enter a username or e-mail address..';
      } else if( ! is_email( $email )) {
        $error = 'Invalid username or e-mail address.';
      } else if( ! email_exists( $email ) ) {
        $error = 'No hemos encontrado usuario registrado con ese nombre de usuario o correo.';
      } else {
        
        $random_password = wp_generate_password( 12, false );
        $user = get_user_by( 'email', $email );
        
        $update_user = wp_update_user( array (
            'ID' => $user->ID, 
            'user_pass' => $random_password
          )
        );
        
        // if  update user return true then lets send user an email containing the new password
        if( $update_user ) {
          $to = $email;
          $subject = 'Tu nueva contraseña.';
          $sender = get_option('name');
          
          $message = 'Tu contraseña es: '.$random_password;
          
          $headers[] = 'MIME-Version: 1.0' . "\r\n";
          $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
          $headers[] = "X-Mailer: PHP \r\n";
          $headers[] = 'From: '.$sender.' < '.$email.'>' . "\r\n";

          $mail = wp_mail( $to, $subject, $message, $headers );
          if( $mail ){
            $success = 'Te hemos enviado un correo con tu nueva contraseña.';
          }else{
            $error = 'Algo ha salido mal, vuelve a intentarlo.';
          }
            
        } else {
          $error = 'Algo ha salido mal, vuelve a intentarlo.';
        }
        
      }
      
    }
?>
<!--html code-->
<?php
  if( ! empty( $error ) ) echo '<div class="message"><p class="error"><strong>ERROR:</strong> '. $error .'</p></div>';
  if( ! empty( $success ) ) echo '<div class="error_login"><p class="success">'. $success .'</p></div>';
?>
<form method="post">
  <fieldset>
    <p>Porfavor ingrese su nombre de usuario o correo. Recibirá un correo con la nueva contraseña.</p>
    <p><label for="user_login">Usuario or Correo:</label>
      <?php $user_login = isset( $_POST['user_login'] ) ? $_POST['user_login'] : ''; ?>
      <input type="text" name="user_login" id="user_login" value="<?php echo $user_login; ?>" /></p>
    <p>
      <input type="hidden" name="action" value="reset" />
      <input type="submit" value="Obtener nueva contraseña" class="button" id="submit" />
    </p>
  </fieldset> 
</form>
