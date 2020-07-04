<?php

	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$date = trim($_POST['date']);
	$attendents = trim($_POST['attendents']);
	$subject = 'Reservation from your website.';

	$emailTo = 'example@mail.com'; // Put your own email address here

	$body = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nDate: $date \n\nAttendents: $attendents";
	$headers = 'From: '.$email."\r\n" .
        'Reply-To: '.$email."\r\n";

	mail($emailTo, $subject, $body, $headers);
	$emailSent = true;
	echo ('success');

?>
