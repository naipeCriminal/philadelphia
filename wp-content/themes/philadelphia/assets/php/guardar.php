<?php
require_once("config.php");
require_once("mail.php");

if(isset($_POST['nombres'])){ $nombres=$_POST['nombres'];} else{ $nombres=0;}
if(isset($_POST['email'])){ $email=$_POST['email'];} else{ $email=0;}
if(isset($_POST['telefono'])){ $telefono=$_POST['telefono'];} else{ $telefono=0;}
if(isset($_POST['estado'])){ $estado=$_POST['estado'];} else{ $estado=0;}
if(isset($_POST['nombreEmpresa'])){ $nombreEmpresa=$_POST['nombreEmpresa'];} else{ $nombreEmpresa=0;}
if(isset($_POST['rollEmpresa'])){ $rollEmpresa=$_POST['rollEmpresa'];} else{ $rollEmpresa=0;}
if(isset($_POST['asunto'])){ $asunto=$_POST['asunto'];} else{ $asunto=0;}
if(isset($_POST['mensaje'])){ $mensaje=$_POST['mensaje'];} else{ $mensaje=0;}
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailValido=1;
}

if($nombres==0 or $email ==0 or $emailValido==0 or $telefono==0 or $estado ==0 or $nombreEmpresa==0 or $rollEmpresa==0 or $asunto==0 or $mensaje==0 ){
	// echo ("email: $emailValido, nombre: $nombre, dia: $dia ,mes:$mes, año:$anio, ciudad:$ciudad, email:$email <br>");
	echo "<span style='color:#E91C1C;'>Falta llenar algunos campos";
	if($nombres=="")echo '<br> Nombre*';
	if($email=="" or $email==0)echo '<br> correo electrónico invalido';
	if($telefono=="0")echo '<br> telefono';
	if($estado=="0")echo '<br> estado';
	if($nombreEmpresa=="0")echo '<br> nombreEmpresa';
	if($rollEmpresa=="")echo '<br> rollEmpresa';
	if($asunto=="")echo '<br> asunto';
	if($mensaje=="")echo '<br> mensaje';
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