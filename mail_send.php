<?php
function send_mail($to, $body)
{
	require 'phpmail/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'ali.haider.cse007@gmail.com';                 // SMTP username
	$mail->Password = 'ali300100';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to
	
	$mail->From = 'email@yourwebite.net';
	$mail->FromName = 'Mailer';
	$mail->addAddress($to);               // Name is optional
	$mail->addReplyTo('email@yourwebite.net', 'Reply');
	
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = 'Verify your email.';
	$mail->Body    = $body;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	if(!$mail->send()) {
		return 'Message could not be sent.';
	} else {
		return 'Message has been sent';
	}
}
?>