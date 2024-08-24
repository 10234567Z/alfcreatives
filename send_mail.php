<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email address to receive the form submissions
    $to = 'alfcreativeswork@gmail.com';
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Prepare the email body
    $email_body = "<h2>New Contact Form Submission</h2>
                   <p><strong>Name:</strong> {$name}</p>
                   <p><strong>Email:</strong> {$email}</p>
                   <p><strong>Subject:</strong> {$subject}</p>
                   <p><strong>Message:</strong><br>{$message}</p>";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "<script>alert('Message sent successfully!');</script>";
        echo "<script>window.location.href = 'index.html';</script>"; // Redirect to a thank you or homepage
    } else {
        echo "<script>alert('Failed to send message. Please try again later.');</script>";
    }
}
?>
