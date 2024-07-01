<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_complet = htmlspecialchars($_POST['nom_complet']);
    $email = htmlspecialchars($_POST['email']);
    $motivations = htmlspecialchars($_POST['motivations']);

    $to = 'karell.jodom@2027.ucac-icam.com';  // Remplacez par votre adresse e-mail
    $subject = 'Nouveau message du formulaire de contact';
    $message = "Nom complet: $nom_complet\nEmail: $email\nMessages: $motivations";
    $headers = "From: jodomchoudja@gmail.com";  // Remplacez par l'adresse e-mail de l'expéditeur

    if (mail($to, $subject, $message, $headers)) {
        echo 'Le message a été envoyé avec succès.';
    } else {
        echo 'Une erreur s\'est produite lors de l\'envoi du message.';
    }
} else {
    echo 'Méthode de requête non valide.';
}
?>
