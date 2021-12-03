<?php 
require_once DIR_ROOT."/commons/mailer/PHPMailer.php";
require_once DIR_ROOT."/commons/mailer/Exception.php";
require_once DIR_ROOT."/commons/mailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function template($title, $btn_label, $btn_link)
{
    $content = file_get_contents(DIR_ROOT.'/commons/mailer/templates.html');
    $content = str_replace('%app_name%', (!empty(option_info()) ? option_info()['app_name'] : 'PolyMobile'), $content);
    $content = str_replace('%app_url%', BASE_URL, $content);
    $content = str_replace('%title%', $title, $content);
    $content = str_replace('%button_label%', $btn_label, $content);
    $content = str_replace('%button_link%', $btn_link, $content);
    return $content;
}

function sendEmail($email, $subject, $content, $btn_label, $btn_link)
{
    try {
        $body = template($content, $btn_label, $btn_link);
        $mail = new PHPMailer();
        $mail->CharSet = "utf-8";
        $mail->isSMTP();
        $mail->Host = MAIL_HOST;
        $mail->SMTPAuth = MAIL_SMTP_AUTH;
        $mail->SMTPSecure = MAIL_SMTP_SECURE;
        $mail->Port = MAIL_PORT;
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->isHTML(true);
        $mail->setFrom(MAIL_USERNAME, 'no-reply');
        $mail->addReplyTo('chuonqit@gmail.com', 'Kiều Văn Chương');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $body;
        $mail->addAddress($email);
        $mail->send();
    } catch (Exception $e) {
        echo "Gui mail that bai.\nMailer error: ".$e->getMessage();
    }
}

function sendEmailOrder($email, $subject, $content)
{
    try {
        $mail = new PHPMailer();
        $mail->CharSet = "utf-8";
        $mail->isSMTP();
        $mail->Host = MAIL_HOST;
        $mail->SMTPAuth = MAIL_SMTP_AUTH;
        $mail->SMTPSecure = MAIL_SMTP_SECURE;
        $mail->Port = MAIL_PORT;
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->isHTML(true);
        $mail->setFrom(MAIL_USERNAME, 'no-reply');
        $mail->Subject = $subject;
        $mail->Body = $content;
        $mail->AltBody = $content;
        $mail->addAddress($email);
        $mail->send();
    } catch (Exception $e) {
        echo "Gui mail that bai.\nMailer error: ".$e->getMessage();
    }
}