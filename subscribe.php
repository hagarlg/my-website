<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    $to = "elbaraa.l.elghazy@gmail.com";
    $subject = "New Newsletter Subscriber";
    $message = "You have a new subscriber: $email";
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for subscribing!";
    } else {
        echo "Error sending email. Please try again later.";
    }
}
?>
