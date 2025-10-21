<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
    public function sendMail($user_email, $books)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ldtung41@gmail.com';
            $mail->Password = 'rpwq yawt tiyt xpnj';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('ldtung41@gmail.com', 'Nhà Nam Book');
            $mail->addAddress($user_email, 'Người nhận');

            $bookList = '<ul>';
            foreach ($books as $book) {
                $bookList .= "<li>{$book}</li>";
            }
            $bookList .= '</ul>';

            $mail->isHTML(true);
            $mail->Subject = 'Thong bao: ban da qua han tra sach!';
            $mail->Body = "
                <p>Xin chào,</p>
                <p>Hệ thống <b>Nhà Nam Book</b> thông báo rằng bạn đã quá hạn trả các cuốn sách sau:</p>
                {$bookList}
                <p>Vui lòng mang sách đến trả tại thư viện trong thời gian sớm nhất.</p>
                <p>Trân trọng,<br>Đội ngũ Nhà Nam Book</p>
            ";

            $mail->AltBody = "Bạn đã quá hạn trả các cuốn sách: " . implode(', ', $books);

            $mail->send();
            return 'Email đã được gửi thành công!';
        } catch (Exception $e) {
            return "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        }
    }
}