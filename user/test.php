<?php

// If you are using Composer (recommended)
//require 'vendor/autoload.php';
// If you are not using Composer

/*grequire("../sendgrid-php/sendgrid-php.php");
require("credentials.php");

$from = new SendGrid\Email("Foodies", "orders@foodies.com");
$subject = "Order Confirmation";

$toemail="farahhisham@hotmail.com";
$to = new SendGrid\Email("Example User", $toemail);

$insidecontent = "sara";

$content = new SendGrid\Content("text/plain", "Hey, sorry if you received any email from us by mistake");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$sg = new \SendGrid($API_KEY);
$response = $sg->client->mail()->send()->post($mail);

echo $response->statusCode();

echo $response->body();
*/
?>