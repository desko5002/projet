<?php
$to = "votre@email.com";
$subject = "Test d'envoi d'e-mail";
$message = "Ceci est un test d'envoi d'e-mail depuis PHP.";
$headers = "From: webmaster@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "E-mail envoyé avec succès.";
} else {
    echo "Échec de l'envoi de l'e-mail.";
}
?>
