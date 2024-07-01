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
    header('Location: formulaire.php?message=' . urlencode('Échec de la connexion : ' . $e->getMessage()));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $nom_club = htmlspecialchars($_POST['nom_club'] ?? '');

    if (!empty($nom_club)) {
        // Suppression de l'enregistrement de la base de données
        $stmt = $db->prepare("DELETE FROM evenements WHERE nom = :nom_club");
        $stmt->bindParam(':nom_club', $nom_club);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                header('Location: deleteevent.php?message=' . urlencode('L\'événement a été supprimé avec succès.'));
            } else {
                header('Location: deleteevent.php?message=' . urlencode('L\'événement n\'existe pas.'));
            }
        } else {
            header('Location: deleteevent.php?message=' . urlencode('Désolé, une erreur s\'est produite lors de la suppression de l\'événement.'));
        }
    } else {
        header('Location: deleteevent.php?message=' . urlencode('Veuillez entrer un nom d\'événement valide.'));
    }
} else {
    header('Location: deleteevent.php?message=' . urlencode('Requête invalide.'));
}
exit();
?>
