<?php
include dirname(__FILE__).'/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
include dirname(__FILE__).'/../vendor/phpmailer/phpmailer/src/Exception.php';
include dirname(__FILE__).'/../vendor/phpmailer/phpmailer/src/SMTP.php';

class SendMail {

    private $name;
    private $email;
    private $text;

    public function __construct($name, $email, $text)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setText($text);
    }

    public function sendMail()
    {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

        $mail->isSMTP();
        $mail->CharSet = 'utf-8';
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false;
        $mail->Host = '192.168.1.185';
        $mail->Port = 25;

        $mail->Username = 'vfhub_teszt@telemax.local';
        $mail->Password = 'vfhubteszt';

        // Recipients
        $mail->setFrom($this->email, $this->name);
        $mail->addAddress('figler.renata@tmx.hu', 'Figler Reni');


        // Content
        $mail->isHTML(true);
        $mail->Subject = "Report an Abduction";
        $mail->msgHTML($this->text);
        $mail->send();
    }

    public function setName($name) {
        $this->name = $name;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setText($text){
        $this->text = $text;
    }
    public function getName() {
        return $this->name;
    }

}

?>