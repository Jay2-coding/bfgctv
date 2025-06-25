<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "josepholawale2580@gmail.com";


    $name = filter_var(trim($_POST['name'] ?? ''), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $subject = filter_var(trim($_POST['subject'] ?? ''), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST['message'] ?? ''), FILTER_SANITIZE_STRING);

    if (empty($name) || empty($email) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please fill in all fields with valid information.";
        exit;
    }


    $email_subject = "Contact Form: " . $subject;


    $email_body = "You have received a new message from your website contact form.\n\n"
                . "Name: $name\n"
                . "Email: $email\n"
                . "Subject: $subject\n"
                . "Message:\n$message\n";


    $headers = "From: noreply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";


    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<h2>Thank you, $name. Your message has been sent successfully.</h2>";
    } else {
        echo "<h2>Sorry, there was an error sending your message. Please try again later.</h2>";
    }
} else {
    echo "<h2>Invalid request.</h2>";
}
?>
