<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $city = htmlspecialchars(trim($_POST['city']));

    // Email details
    $to = "contact@ifvfertility.com"; // Replace with your email
    $subject = "New Demo Request from $name";
    $message = "
        <html>
        <head>
            <title>New Demo Request</title>
        </head>
        <body>
            <h2>New Request Free Demo Submission</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>City:</strong> $city</p>
        </body>
        </html>
    ";

    // Headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your request! We'll get back to you soon.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    echo "Invalid Request.";
}
?>
