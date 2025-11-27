<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "sales@siepl.co.in";

    $name    = htmlspecialchars(strip_tags($_POST['name']));
    $email   = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone   = htmlspecialchars(strip_tags($_POST['phone']));
    $project = htmlspecialchars(strip_tags($_POST['project']));
    $subject = !empty($_POST['subject']) ? htmlspecialchars(strip_tags($_POST['subject'])) : "New Contact Form Submission";
    $message_content = "
Name: $name
Email: $email
Phone: $phone
Project: $project
Message: $message
    ";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if(mail($to, $subject, $message_content, $headers)){
        echo "<script>alert('✅ Message sent successfully'); window.location='contact.html';</script>";
    } else {
        echo "<script>alert('❌ Message could not be sent'); window.location='contact.html';</script>";
    }
}
?>
