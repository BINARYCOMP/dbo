<?php
class PHPMailer_Library
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load($subject, $message, $email)
    {
        require_once(APPPATH."third_party/PHPMailer-master/src/PHPMailer.php");
        require(APPPATH."third_party/PHPMailer-master/src/SMTP.php");
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "kresnaaji28@gmail.com";
        $mail->Password = "";
        $mail->SetFrom("BINARY_CORP@gmail.com");
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AddAddress($email);

         if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
            redirect('c_login','refresh');  
         }
    }
}