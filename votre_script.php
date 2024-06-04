<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Charger PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $mail = new PHPMailer(true);
    
    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com ';  // Remplacez par votre serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'ref.kaa2002@gmail.com'; // Remplacez par votre adresse e-mail
        $mail->Password = '2662002refka'; // Remplacez par votre mot de passe
        $mail->Port = 587; // Port SMTP
        
        // Destinataire et contenu de l'e-mail
        $mail->setFrom($email, $name);
        $mail->addAddress('ref.kaa2002@gmail.com'); // Remplacez par l'adresse de destination
        $mail->Subject = "Nouveau message de $name";
        $mail->Body = "Nom: $name\nEmail: $email\nMessage:\n$message";
        
        // Envoyer l'e-mail
        $mail->send();
        echo "L'e-mail a été envoyé avec succès!";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail: {$mail->ErrorInfo}";
    }
}
?>
