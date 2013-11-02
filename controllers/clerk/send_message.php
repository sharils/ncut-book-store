<?php
require_once 'models/message/Message.php';
use ncut_book_store\Container;

class Sendmessage
{
    private $clerk;
    private $studentorder;

    public static function getStudentOrder(clerk $clerk, $studentorder){
        return new self($clerk, $studentorder);
    }

    public function __construct($clerk, $studentorder)
    {
        $this->clerk = $clerk;
        $this->studentorder = $studentorder;
    }

    public function email(){

        $id = $this->studentorder->id();
        $student = $this->studentorder->student();
        $name = $student->name();

        $mail = Container::newPHPMailer();
        $mail->Subject = '校務線上訂書系統：訂單取貨通知';
$mail->Body = <<<TEXT
$name 您好：

您訂單編號為[$id]的書籍已可至員生社取貨付款。

請注意：此信件由系統自動發送，請勿直接回覆此信。

若有任何疑問請使用網站內的訊息系統進行連絡，謝謝。
TEXT;

        $mail->AddAddress($student->email(), $student->name());
        $mail->Send();
    }

    public function message()
    {
        $id = $this->studentorder->id();
        $student = $this->studentorder->student();
        $name = $student->name();

        $content = <<<TEXT
$name 您好：

您訂單編號為[$id]的書籍已可至員生社取貨付款。

若有任何疑問請使用網站內的訊息系統進行連絡，謝謝。
TEXT;
        Message::create($this->clerk, $student, $content);
    }
}
