<?php
// Informations de connexion à la base de données
$host = 'localhost'; // Nom d'hôte de la base de données
$dbname = 'pro'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur de la base de données
$password = ''; // Mot de passe de la base de données

try {
    // Connexion à la base de données avec PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configure PDO pour qu'il lève des exceptions en cas d'erreurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Gérer les erreurs de connexion
    echo 'Échec de la connexion : ' . $e->getMessage();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_club = htmlspecialchars($_POST['nom_club'] ?? '');
    $description = htmlspecialchars($_POST['description'] ?? '');
    $lien = htmlspecialchars($_POST['lien'] ?? 'http://example.com'); // Lien par défaut

    // Gestion de l'upload de l'image
    $target_dir = "uploads/"; // Assurez-vous que ce dossier existe et est accessible en écriture
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifiez si le fichier est une image réelle ou une fausse image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Vérifiez si le fichier existe déjà
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    // Limitez la taille du fichier


    // Limitez les formats de fichier autorisés
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    // Vérifiez si $uploadOk est défini à 0 par une erreur
    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Enregistrement des données dans la base de données
            $stmt = $db->prepare("INSERT INTO club (nom_club, description, image, lien) VALUES (:nom_club, :description, :image, :lien)");
            $stmt->bindParam(':nom_club', $nom_club);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $target_file);
            $stmt->bindParam(':lien', $lien);

            if ($stmt->execute()) {
                // Redirection vers une page spécifique après un succès
                header('Location: addclub.php'); // Remplacez par l'URL de votre page de succès
                exit();
            } else {
                header('Location: addclub.php'); // Remplacez par l'URL de votre page de succès
            }
        } else {
            header('Location: addclub.php'); // Remplacez par l'URL de votre page de succès
        }
    }
}
?>
