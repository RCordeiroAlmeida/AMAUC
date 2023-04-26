<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require('library/phpmailer/src/PHPMailer.php');
    require('library/phpmailer/src/SMTP.php');
    require('library/phpmailer/src/Exception.php');


    //Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

    
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'naoresponda@amauc.org.br';                     //SMTP username
        $mail->Password   = 'T8Lq.CjP8j@!2';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('naoresponda@amauc.org.br', 'AMAUC');
        
?>