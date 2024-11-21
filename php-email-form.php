<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

class PHP_Email_Form {
    public $to = '';
    public $from_name = '';
    public $from_email = '';
    public $subject = '';
    public $smtp = [];
    public $messages = [];

    public function add_message($content, $label, $priority = 0) {
        $this->messages[] = [
            'content' => $content,
            'label' => $label,
            'priority' => $priority
        ];
    }

    public function send() {
        $mail = new PHPMailer(true);

        try {
            if (!empty($this->smtp)) {
                //Server settings
                $mail->isSMTP();
                $mail->Host = $this->smtp['host'];
                $mail->SMTPAuth = true;
                $mail->Username = $this->smtp['username'];
                $mail->Password = $this->smtp['password'];
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = $this->smtp['port'];
            }

            //Recipients
            $mail->setFrom($this->from_email, $this->from_name);
            $mail->addAddress($this->to);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $this->subject;

            $body = '';
            foreach ($this->messages as $message) {
                $body .= '<strong>' . $message['label'] . ':</strong> ' . $message['content'] . '<br>';
            }

            $mail->Body = $body;

            $mail->send();
            return 'Message has been sent';
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
