<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $name = stripcslashes($_POST['name']);
    $email = stripcslashes($_POST['email']);
    $phone = stripcslashes($_POST['phone']);
    $comment = stripcslashes($_POST['comments']);
    $rating = stripcslashes($_POST['rate']);

    $subject = 'Max Decors Contact Form'; // Define your email subject

    $mail->Host = 'mail.newbrightindia.com';
    $mail->Username = 'smt@newbrightindia.com';
    $mail->Password = 'Lizyweb@123';

    $mail->setFrom('smt@lizyweb.com', $name);
    $mail->addAddress('maxoninfrastructure@gmail.com');
    $mail->Subject = $subject;

    $message = "Name: $name<br /><br />";
    $message .= "Email: $email<br /><br />";
    $message .= "Phone: $phone<br /><br />";
    $message .= "Comments: $comment<br /><br />";
    $message .= "Rating: $rating";

    $mail->MsgHTML($message);

    if ($mail->Send()) {
        echo "</fieldset>";
        echo "<div id='success_page'>";
        echo "<h1>Your Message Sent Successfully.</h1>";
        echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us. We will contact you shortly.</p>";
        echo "</div>";
        echo "</fieldset>";

        echo '<a href="index.html">Return to Home</a>';
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Mailer Error: " . $e->getMessage();
}
?>
