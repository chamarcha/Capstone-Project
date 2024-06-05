<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Autoload PHPMailer using Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $saran = $_POST['saran'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0; // Aktifkan output debug rinci
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sec.palembang.team19.tarevou@gmail.com'; // Ganti dengan email Gmail Anda
        $mail->Password = 'njge wkyd yyzd wyuk'; // Ganti dengan App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('sec.palembang.team19.tarevou@gmail.com', $nama); // Ganti dengan email Gmail Anda
        $mail->addAddress('sec.palembang.team19.tarevou@gmail.com'); // Email penerima

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Feedback dari ' . $nama;
        $mail->Body    = "
        <html>
        <head>
            <title>Feedback</title>
        </head>
        <body>
            <p>Nama: $nama</p>
            <p>Email: $email</p>
            <p>Saran:</p>
            <p>$saran</p>
        </body>
        </html>
        ";

        $mail->send();
        echo '<script>alert("Pesan telah terkirim. Kembali ke formulir."); window.location.href = "feed.html";</script>';
    } catch (Exception $e) {
        echo "Pengiriman feedback gagal. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
