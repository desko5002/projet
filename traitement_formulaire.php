<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom_complet = $_POST['nom_complet'];
    $email = $_POST['email'];
    $promotion = $_POST['promotion'];
    $matricule = $_POST['matricule'];

    // Valider les données si nécessaire
    // ...

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pro";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configurer PDO pour lever des exceptions en cas d'erreur
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer la requête SQL d'insertion
        $stmt = $conn->prepare("INSERT INTO inscription_requests (nom_complet, email, promotion, matricule) VALUES (:nom_complet, :email, :promotion, :matricule)");

        // Lier les paramètres
        $stmt->bindParam(':nom_complet', $nom_complet);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':promotion', $promotion);
        $stmt->bindParam(':matricule', $matricule);

        // Exécuter la requête
        $stmt->execute();

        header('Location: merci.php');

    } catch (PDOException $e) {
        header('Location: da.php');
    }

    // Fermer la connexion
    $conn = null;
}
?>
