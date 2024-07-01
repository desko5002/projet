<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $request_id = $_POST['request_id'];
    $action = $_POST['action']; // 'accepter' ou 'refuser'

    // Connexion à la base de données (utiliser PDO ou MySQLi)
    $host = 'localhost';
    $dbname = 'pro';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Mettre à jour le statut de la demande
        if ($action === 'accepter') {
            // Insérer dans la table inscritsdanse
            $query_insert = "INSERT INTO inscritsdanse (nom_complet, email, promotion, matricule) 
                             SELECT nom_complet, email, promotion, matricule FROM inscription_requests WHERE id = :request_id";
            $stmt_insert = $db->prepare($query_insert);
            $stmt_insert->execute(['request_id' => $request_id]);

            // Mettre à jour le statut de la demande à 'accepte'
            $query_update = "UPDATE inscription_requests SET statut = 'accepte' WHERE id = :request_id";
            $stmt_update = $db->prepare($query_update);
            $stmt_update->execute(['request_id' => $request_id]);

        } elseif ($action === 'refuser') {
            // Supprimer la demande de la table inscription_requests
            $query_delete = "DELETE FROM inscription_requests WHERE id = :request_id";
            $stmt_delete = $db->prepare($query_delete);
            $stmt_delete->execute(['request_id' => $request_id]);
        }

        // Rediriger vers le dashboard après traitement
        header("Location: dashboard.php");
        exit;

    } catch(PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
        exit;
    }
}
?>
