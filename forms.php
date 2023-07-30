<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $business_unit = $_POST['business_unit'];
    $email = $_POST['email'];
    $interests = isset($_POST['interest']) ? implode(", ", $_POST['interest']) : 'None';
    $message = $_POST['message'];

    $to = 'itcodefair@cdu.edu.au';
    $subject = 'Contact Form Submission';
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $body = 'Name: ' . $name . "\n" .
            'Organisation/Business unit: ' . $business_unit . "\n" .
            'Email: ' . $email . "\n" .
            'Interest: ' . $interests . "\n" .
            'Message: ' . $message;

    if (mail($to, $subject, $body, $headers)) {
        echo 'Email sent successfully!';
    } else {
        echo 'Failed to send email. Please try again later.';
    }
} else {
    echo 'Invalid request.';
}
?>
