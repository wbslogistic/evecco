<?php
// Email Submit
// Note: filter_var() requires PHP >= 5.2.0
if ( isset($_POST['email']) && isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['message']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
 
  // detect & prevent header injections
  $test = "/(content-type|bcc:|cc:|to:)/i";
  foreach ( $_POST as $key => $val ) {
    if ( preg_match( $test, $val ) ) {
      exit;
    }
  }

$headers = 'From: ' . $_POST["name"] . '<' . $_POST["email"] . '>' . "\r\n" .
    'Reply-To: ' . $_POST["email"] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$message = 'From: ' . $_POST["name"] . "\n" . 'E-mail: ' . $_POST["email"] . "\n" . 'Phone: ' . $_POST["subject"] . "\n" . 'Message: ' . $_POST["message"] . "\n";

  //
  mail( "oakrasnov@yandex.ru, dmitry@evecco.com", $_POST['name'] , $message , $headers );
 
  //      ^
  //  Replace with your email 
}
?>