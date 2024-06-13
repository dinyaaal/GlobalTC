<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'sxb1plzcpnl505586.prod.sxb1.secureserver.net';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'info@global-tc.pl';                     //SMTP username
	$mail->Password   = 'HdxiZDZiscUL';                               //SMTP password
	$mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	

	//Від кого лист
	$mail->setFrom('info@global-tc.pl', 'Global TC Group'); // Вказати потрібний E-mail
	//Кому відправити
	$mail->addAddress('info@global-tc.pl'); // Вказати потрібний E-mail
	//Тема листа
	$mail->Subject = 'Global TC Group';

	//Тіло листа
	$body = '<h1>Global TC Group</h1>';

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['email']))){
		$body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
	}	
	

	$mail->Body = $body;

	//Відправляємо
	if (!$mail->send()) {
		$message = 'Error';
	} else {
		$message = 'Successfully!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>