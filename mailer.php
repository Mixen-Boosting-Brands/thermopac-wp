<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Disable error reporting in production
ini_set("display_errors", 0);
ini_set("display_startup_errors", 0);
error_reporting(0);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "./PHPMailer/PHPMailer.php";
    require "./PHPMailer/SMTP.php";
    require "./PHPMailer/Exception.php";

    // --- FIELD VALIDATION ---
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
        // --- SERVER SETTINGS (Basado en la configuración de tu hosting) ---
        $mail->isSMTP();
        $mail->Host = "petropac.com.mx"; // Servidor SMTP según tu captura
        $mail->SMTPAuth = true;
        $mail->Username = "noreplythermopac@petropac.com.mx"; // Usuario
        $mail->Password = '$m^S#{2@rMj8'; // Usar comillas simples para evitar interpretación de $
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL para puerto 465
        $mail->Port = 465; // Puerto según tu captura

        // Configuración adicional para evitar timeouts
        $mail->Timeout = 30;
        $mail->SMTPKeepAlive = false;

        // Activar debug TEMPORALMENTE para ver qué está pasando
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Comentado para producción

        // Opciones SSL menos estrictas
        $mail->SMTPOptions = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true,
            ],
        ];

        // --- RECIPIENTS ---
        // Usar el email autenticado como remitente
        $mail->setFrom("noreplythermopac@petropac.com.mx", "Thermopac Website");
        $mail->addAddress("ventas@thermopac.com", "Thermopac Contact");
        $mail->addReplyTo($email, $name);

        // --- CONTENT ---
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission: " . $subject;

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

        // Mensaje genérico para el usuario
        echo "We're sorry, something went wrong and your message could not be sent. Please try again later.";

        // Loguear el error en el servidor (no visible al usuario)
        error_log("PHPMailer Error: {$mail->ErrorInfo}");
    }
} else {
    http_response_code(403);
    echo "You are not allowed to access this page directly.";
}
?>
