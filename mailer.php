<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Make sure the PHPMailer files are in the correct path relative to mailer.php
    // If mailer.php is in the theme root, and PHPMailer is in a 'PHPMailer' subdirectory, this is correct.
    require "./PHPMailer/PHPMailer.php";
    require "./PHPMailer/SMTP.php";
    require "./PHPMailer/Exception.php";

    // --- FIELD VALIDATION ---
    // Check that all required fields are filled
    if (
        empty($_POST["name"]) ||
        empty($_POST["email"]) ||
        empty($_POST["phone"]) ||
        empty($_POST["subject"]) ||
        empty($_POST["message"])
    ) {
        http_response_code(400);
        echo "Please fill out all required fields.";
        exit();
    }

    // Sanitize and prepare variables
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $subject = strip_tags(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please enter a valid email address.";
        exit();
    }

    // --- EMAIL SENDING LOGIC ---
    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";

    try {
        // --- SERVER SETTINGS --- (You will configure these manually)
        $mail->isSMTP();
        $mail->Host = "smtp.example.com"; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = "your_email@example.com"; // Your SMTP username
        $mail->Password = "your_smtp_password"; // Your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Uncomment for debugging

        // --- RECIPIENTS ---
        $mail->setFrom($email, $name);
        $mail->addAddress("recipient@example.com", "Thermopac Contact"); // Where the email will be sent
        $mail->addReplyTo($email, $name);

        // --- CONTENT ---
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission: " . $subject;

        // Build the email body
        $mail->Body =
            "
            <h2>New Message from Thermopac Website</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Subject:</strong> {$subject}</p>
            <hr>
            <p><strong>Message:</strong></p>
            <p>" .
            nl2br($message) .
            "</p>
        ";

        // Build a plain text version for email clients that don't support HTML
        $mail->AltBody = "
            New Message from Thermopac Website\n
            Name: {$name}\n
            Email: {$email}\n
            Phone: {$phone}\n
            Subject: {$subject}\n
            Message:\n{$message}
        ";

        $mail->send();
        http_response_code(200);
        echo "Thank you! Your message has been sent successfully.";
    } catch (Exception $e) {
        http_response_code(500);
        echo "We're sorry, something went wrong and your message could not be sent. Please try again later.";
        // For debugging: echo "Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If the file is accessed directly, not via POST
    http_response_code(403);
    echo "You are not allowed to access this page directly.";
}
?>
