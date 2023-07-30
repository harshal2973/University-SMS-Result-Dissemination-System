<?php
// $number=$_GET['number'];
// $text=$_GET['text'];


 use Twilio\Rest\Client;
 require __DIR__ . '/vendor/autoload.php';

// // require_once "Twilio/autoload.php"

// // Your Account SID and Auth Token from twilio.com/console
// // To set up environmental variables, see http://twil.io/secure
$account_sid = 'AC9d52a120849a9970155bc8a121c07727';
$auth_token ='93e440d946096e354854859db1e1ef7f';
// // In production, these should be environment variables. E.g.:
// // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// // A Twilio number you own with SMS capabilities
$twilio_number = "+12543562400";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+918758014936',
    array(
        'from' => $twilio_number,
        'body' => "This is text sample"
    )
);

// echo $number;
?>
