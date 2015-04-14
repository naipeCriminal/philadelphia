<?php
require_once("config.php");
require_once("mail.php");
$emailValido=0;
// print_r($_POST);
// die;

if(isset($_POST['nombres'])){ $nombres=$_POST['nombres'];} else{ $nombres="";}
if(isset($_POST['email'])){ $email=$_POST['email'];} else{ $email="";}
if(isset($_POST['telefono'])){ $telefono=$_POST['telefono'];} else{ $telefono="";}
if(isset($_POST['estado'])){ $estado=$_POST['estado'];} else{ $estado="";}
if(isset($_POST['nombreEmpresa'])){ $nombreEmpresa=$_POST['nombreEmpresa'];} else{ $nombreEmpresa="";}
if(isset($_POST['rollEmpresa'])){ $rollEmpresa=$_POST['rollEmpresa'];} else{ $rollEmpresa="";}
if(isset($_POST['asunto'])){ $asunto=$_POST['asunto'];} else{ $asunto="";}
if(isset($_POST['mensaje'])){ $mensaje=$_POST['mensaje'];} else{ $mensaje="";}

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailValido=1;
}

if($nombres=="" or $email==""  or $emailValido==0 or $telefono=="" or $estado=="" or $nombreEmpresa=="" or $rollEmpresa=="" or $asunto=="" or $mensaje=="" ){
	echo " <span style='color:#E91C1C;'>Falta llenar algunos campos <br>";
	if($nombres=="")echo 'Nombre* <br>';
	if($email=="" ) echo 'correo electrónico* <br>';
	if($emailValido==0) echo 'correo electrónico invalido <br>';
	if($telefono=="")echo 'telefono<br>';
	if($estado=="")echo 'estado<br>';
	if($nombreEmpresa=="")echo 'nombreEmpresa<br>';
	if($rollEmpresa=="")echo 'rollEmpresa<br>';
	if($asunto=="")echo 'asunto<br>';
	if($mensaje=="")echo 'mensaje<br>';
	echo "</span>";
}else{
	//instancio un objeto de la clase PHPMailer
	//Creamos la instancia de la clase PHPMAiler
	    $mail = new phpmailer();
	    $mail->CharSet = "UTF-8";
	    $mail->Mailer = "smtp";
	    $mail->Host = "dns.solidred.com.mx";
	    $mail->SMTPAuth = true;
	    $mail->Username = "developer@catorcedias.com";
	    $mail->Password = "CFz8ZKAWPfW6";
	    $mail->From = "consumidor@conmx.jnj.com";
	    $mail->FromName = "consumidor@conmx.jnj.com";
	    $email=$_POST['email'];
	    $mail->AddAddress($_POST['email']);
	    $mail->AddBCC("consumidor@conmx.jnj.com");
	    $mail->IsHTML(true);
	    $mail->Subject = "NewsLetter";

	    $mail->Body = "<img src='http://www.developercatorcedias.com/splendaNew/SPLENDA_mailing_newsletter.jpg' alt='¡Felicidades! ya formas parte del selecto grupo de SPLENDA®. Espera las grandes sorpresas que tenemos para ti' style='position:absolute;'/>";
	    $mail->AltBody = "";
	    //Si al enviar el correo devuelve true es que todo ha ido bien.
	    if($mail->Send())
	    {
	        //Sacamos un mensaje de que todo ha ido correctamente.
	        echo "Registro exitoso";
	    }
	    else
	    {
	        //Sacamos un mensaje con el error.
	        echo "Ocurrió un error al enviar el correo electrónico.";
	    }
	}

?>