<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "josepholawale2580@gmail.com";

    $fname = htmlspecialchars(trim($_POST['fname'] ?? ''));
    $mname = htmlspecialchars(trim($_POST['mname'] ?? ''));
    $sname = htmlspecialchars(trim($_POST['sname'] ?? ''));
    $address = htmlspecialchars(trim($_POST['address'] ?? ''));
    $tel = htmlspecialchars(trim($_POST['tel'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $dateOfBirth = htmlspecialchars(trim($_POST['dateOfBirth'] ?? ''));
    $marital_status = htmlspecialchars(trim($_POST['marital-status'] ?? ''));
    $gender = htmlspecialchars(trim($_POST['gender'] ?? ''));
    $profession = htmlspecialchars(trim($_POST['profession'] ?? ''));
    $born_again = htmlspecialchars(trim($_POST['born-again'] ?? ''));
    $salvation_date = htmlspecialchars(trim($_POST['salvation-date'] ?? ''));
    $how_know = htmlspecialchars(trim($_POST['how-know'] ?? ''));
    $baptized = htmlspecialchars(trim($_POST['baptized'] ?? ''));
    $baptism_date = htmlspecialchars(trim($_POST['baptism-date'] ?? ''));
    $spirit = htmlspecialchars(trim($_POST['spirit'] ?? ''));
    $how_spirit = htmlspecialchars(trim($_POST['how-spirit'] ?? ''));
    $gift = htmlspecialchars(trim($_POST['gift'] ?? ''));
    $gift_list = htmlspecialchars(trim($_POST['gift-list'] ?? ''));
    $old_ministry = htmlspecialchars(trim($_POST['old-ministry'] ?? ''));
    $departments = isset($_POST['department']) ? implode(', ', array_map('htmlspecialchars', $_POST['department'])) : '';
    $serve = htmlspecialchars(trim($_POST['serve'] ?? ''));
    $commit = htmlspecialchars(trim($_POST['commit'] ?? ''));

    $subject = "New Worker's Application Form Submission";

     $message = "You have received a new Worker's Application Form submission:\n\n"
        . "First Name: $fname\n"
        . "Middle Name: $mname\n"
        . "Surname: $sname\n"
        . "Address: $address\n"
        . "Phone Number: $tel\n"
        . "Email: $email\n"
        . "Date of Birth: $dateOfBirth\n"
        . "Marital Status: $marital_status\n"
        . "Gender: $gender\n"
        . "Profession/Work: $profession\n\n"
        . "Are you Born Again?: $born_again\n"
        . "Date of Salvation: $salvation_date\n"
        . "How do you know?: $how_know\n"
        . "Baptized by immersion?: $baptized\n"
        . "Date of Baptism: $baptism_date\n"
        . "Filled with the Holy Spirit?: $spirit\n"
        . "How do you know (Holy Spirit)?: $how_spirit\n"
        . "Spiritual gifts?: $gift\n"
        . "Gift list: $gift_list\n\n"
        . "How long in ministry?: $old_ministry\n"
        . "Departments to serve: $departments\n"
        . "Why serve?: $serve\n"
        . "Willing to commit?: $commit\n";

    // Email headers
    $headers = "From: noreply@yourdomain.com\r\n";
    if (!empty($email)) {
        $headers .= "Reply-To: $email\r\n";
    }

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<h2>Thank you! Your application has been submitted successfully.</h2>";
    } else {
        echo "<h2>Sorry, there was an error sending your application. Please try again later.</h2>";
    }
} else {
    echo "<h2>Invalid request.</h2>";
}
?>
