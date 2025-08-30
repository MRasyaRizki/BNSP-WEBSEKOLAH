<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        $nama = $request->nama;
        $email = $request->email;
        $pesan = $request->pesan;

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'emailkamu@gmail.com';
            $mail->Password   = 'password_email';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Penerima
            $mail->setFrom($email, $nama);
            $mail->addAddress('muhammadrasyarizki301@gmail.com', 'Admin Sekolah');

            // Konten email
            $mail->isHTML(true);
            $mail->Subject = 'Pesan dari Form Kontak';
            $mail->Body    = "<b>Nama:</b> $nama <br>
                              <b>Email:</b> $email <br>
                              <b>Pesan:</b> $pesan";

            $mail->send();
            return back()->with('success', 'Pesan berhasil dikirim!');
        } catch (Exception $e) {
            return back()->with('error', "Pesan gagal dikirim: {$mail->ErrorInfo}");
        }
    }
}
