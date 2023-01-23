<?php 

require_once("Database.php");

class Mail extends Database 
{
    public function send($receiver, $sender, $title, $body)
    {
        ini_set("mail.log", "/tmp/mail.log");
        ini_set("mail.add_x_header", TRUE);

        $to = "$receiver";
        $subject = "$title";
        $message = "$body";
        $headers = implode("\r\n", [
        "From: $sender",
        "Reply-To: $sender",
        "X-Mailer: PHP/" . PHP_VERSION
        ]);

        $result = mail($to, $subject, $message, $headers);

        if ($result) 
        {
            return TRUE;
        }
        else
        { 
            return FALSE;
        }
    }
}
