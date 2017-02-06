<?php
	//$Firstname=$_POST['FirstName'];
	//$Lastname=$_POST['LastName'];
        $FullName=$_POST['FullName'];
	$Email=$_POST['Email'];
	$Comments=$_POST['Message'];

require_once '../lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('driverfriendlyhelp@gmail.com')
  ->setPassword('pwdpwdpwd')
  ;

$mailer = Swift_Mailer::newInstance($transport);

// Create the message
$message = Swift_Message::newInstance()

  ->setSubject('You have a new message from ' . $FullName . '.')
  ->setFrom($Email)
  ->setTo('driverfriendlyhelp@gmail.com')
  ->setReplyTo($Email)
  ->setBody($Comments);
  
$result = $mailer->send($message);

	echo "<h1 class='msg_sent'> Your message has been sent.</h1><br/>";
	echo "<p class='msg_sent_p'>We will get back to you within 24 hours.</p>";

if (!$result) { 
  echo "<h1 class='msg_sent'>Your message has failed to send...</h1></br>";
  echo "<br/><p class='msg_sent_p'> Refresh this page to try again or if you want to get in touch with us by phone feel free to call us at (732) 226-9859 during our <a style='text-decoration:none' href='http://localhost/PHPClassFiles/pet-shop/ppz.php?page=hours#hours'>business hours.</a> </p>";
}	
 
?>