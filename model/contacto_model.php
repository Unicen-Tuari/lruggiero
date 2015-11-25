<?php

	// Inclusion del Archivo de Modelo Base
	REQUIRE_ONCE('main_model.php');

	// Inclusion del Archivo de PHPMailer Base
	REQUIRE_ONCE('libs/phpmailer/class.phpmailer.php');

	// Inclusion del Archivo de PHPMailer SMTP
	REQUIRE_ONCE('libs/phpmailer/class.smtp.php');

	// Clase de Contacto
	class ContactoModel extends MainModel{

		// Almacena la Consulta Enviada
		function agregarConsulta($nombre, $nick, $email, $ubicacion, $consulta){
			if(strlen($nombre) > 1 && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($consulta) > 49){
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				try{
					$this->db->beginTransaction();
					$queryInsert = $this->db->prepare('INSERT INTO consulta(nombre, nick, email, ubicacion, consulta, fecha, hora) VALUES(?, ?, ?, ?, ?, ?, ?)');
					$queryInsert->execute(array($nombre, $nick, $email, $ubicacion, $consulta, date('d/m/y'), date('H:i')));
					$this->db->commit();
					$this->enviarEmail($nombre, $email, $consulta);
					return 0;
				} catch(Exception $e){
					$this->db->rollBack();
					return 1;
				}
			} else {
				return 1;
			}
		}

		// Envia un Email con Copia de la Consulta
		function enviarEmail($nombre, $email, $consulta){
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465; 
			$mail->Username = 'probandoenviarmails@gmail.com';  
			$mail->Password = '123456789@a';           
			$mail->SetFrom('probandoenviarmails@gmail.com', 'ARKTandil');
			$mail->Subject = $nombre;
			$mail->Body = $consulta;
			$mail->AddAddress($email);
			$mail->Send();
		}
	}
?>