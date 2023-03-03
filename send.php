<?php
$MAIL_TARGET = "mark.brobyn@gmail.com";
$sendMail = true;
$fileWrite = false;
$echoScreen = false;
$emailMessage = "";
$maxLenName = 64;
$maxLenEmail = 128;
$maxLenMessage = 1024;

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// parse name
$name = trim($name, " ");
$name = preg_replace("/\s\s+/", " ", $name); // remove additional spaces
$name = preg_replace("#[^a-zA-Z0-9\ ]+#", "", $name);
if(strlen($name)>$maxLenName) $name = substr($name,0,$maxLenName);

// parse email
$email = preg_replace("#[^a-zA-Z0-9@.]+#", "", $email);
if(strlen($email)>$maxLenEmail) $email = substr($email,0,$maxLenEmail);

// parse message
$message = trim($message, " ");
$message = preg_replace("#[^a-zA-Z0-9\ \£\-.,;@%$]+#", "", $message);
if(strlen($message)>$maxLenMessage) $message = substr($message,0,$maxLenMessage);

$emailMessage = $name . "\n" . $email . "\n" . $message;

if($sendMail) {
  $headers = "From: 'cvdev@mark.brobyn.com' <cvdev@mark.brobyn.com>\r\n";
  // mail($MAIL_TARGET, "Email contact from mark.brobyn.com/cvdev", $emailMessage, $headers);
  mail($MAIL_TARGET, "Portfolio contact from $name ($email)", $emailMessage, $headers);
}

if($echoScreen) {
  echo "name:" . $name . "<br>";
  echo "email:" . $email . "<br>";
  echo "message:" . $message . "<br>"; 
  echo $emailMessage;
}

?>

