<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function hoursToMinutes($hours)
{
  $minutes = 0;
  if (strpos($hours, ':') !== false)
  {
      // Split hours and minutes.
      list($hours, $minutes) = explode(':', $hours);
  }
  return $hours * 60 + $minutes;
}

// Transform minutes like "105" into hours like "1:45".
function minutesToHours($minutes)
{
  $hours = (int)($minutes / 60);
  $minutes -= $hours * 60;
  return sprintf("%d:%02.0f", $hours, $minutes);
}





function send_activation_email(string $email, string $activation_code): void
{


    require "Content/library/mailer/src/Exception.php";
    require "Content/library/mailer/src/PHPMailer.php";
    require "Content/library/mailer/src/SMTP.php";
    $mail             = new PHPMailer();

    $body     = "
    <!DOCTYPE html>
    <html lang='en'>
      <head>
        <meta charset='utf-8'/>
        <title>Creation Compte</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Anybody:ital,wght@0,500;1,200&display=swap' rel='stylesheet'>
            <style>
            @import url('https://fonts.googleapis.com/css2?family=Anybody:ital,wght@0,500;1,200&display=swap');
            </style>
            </head>
    <body style='align-items:center; justify-content:center; text-align:center; '>

    <div>
    <h1 style='font-size: 48px; font-weight: 400; margin-bottom: 80px ; padding: 50px; padding-top: 50px; position:relative; top:60px; font-family: 'Anybody', cursive; '>Bienvenue chez  </h1> <img src='https://www.fenelon.fr/lycee-general-et-technologique/activites/animath-lycee-general.png/image_preview' alt='entete' style='width: 349px; height: 144px; padding-bottom: -80px; '>
        <p style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
         Nous somme très heureux de vous acceuillir sur notre site. </br>
         </p>
         <p style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
         Mais avant que vous puissiez l'utiliser veuillez clicker ici pour confirmer votre inscription:</br>
         </p>
        <a href='http://localhost/~12100562/MVC_V_7/MVC_V_7/MVC/?controller=verify&action=verifyEmail&email=$email&activation_code=$activation_code
'>
Link

        </a>
        </div>

        </body>
        </html>
    ";

    $mail->IsSMTP(); // telling the class to use SMTP

    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
    $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
    $mail->Username   = "animath.sae@gmail.com";  // GMAIL username
    $mail->Password   = "grztdfnvgzddhvsi";            // GMAIL password

    $mail->SetFrom('animath.sae@gmail.com', 'Animath .CO');

    $mail->AddReplyTo("animath.sae@gmail.com","Animath .CO");

    $mail->Subject    = "Validation Chez Animath !";

    $mail->AltBody    = "
    Clicker ici pour confirmer votre inscription:
    http://localhost/MVC_V_4/MVC/?controller=verify&action=verifyEmail&email=$email&activation_code=$activation_code
    "; // optional, comment out and test

    $mail->MsgHTML($body);

    $address = $email;
    $nomcomp = $_SESSION['Nom'] .'  '. $_SESSION['prenom'];
    $_SESSION['link'] = "    http://localhost/MVC_V_4/MVC/?controller=verify&action=verifyEmail&email=$email&activation_code=$activation_code
";
    $mail->AddAddress($address, $nomcomp);

    if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      echo "mail sent";
    }
}

    function find_unverified_user(string $activation_code, string $email): bool
{

      require_once('Models/Model.php');
      $v = Model::getModel();
      $user = $v->VerifyExpirationtoken($email);
    if ($user) {
        if ((int)$user['expired'] === 1) {
            require_once('Models/Model.php');
            $t = Model::getModel();
            $id= $t->getIDfromEmail($email);
            $t->DeleteUserByID($id);
            return 0;
        }
        if (password_verify($activation_code, $user['activation_code'])) {
            return 1;
        }
    }
    else{
        return 0;
    }

}



?>
