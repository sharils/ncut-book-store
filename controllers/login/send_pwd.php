<?php
use ncut_book_store\Container;

$mail = Container::newPHPMailer();
$mail->Subject = '校務線上訂書系統：密碼初始化';
$mail->Body = <<<TEXT
親愛的使用者您好,

您的密碼已初始化為：$rand

使用上述初始密碼登錄后，請進入「個人資料 > 修改密碼」中修改初始密碼。

如不修改，可以繼續使用初始密碼。

請注意：此信件由系統自動發送，請勿直接回覆此信。
TEXT;

$mail->AddAddress($role_user->email(), $role_user->name());
$mail->Send();
