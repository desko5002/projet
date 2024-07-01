<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Demandes d'inscription</title>
    <!-- Inclure vos fichiers CSS -->
    <link rel="stylesheet" href="Demandes.css">
</head>
<body>
<div class="dashboard">
    <h2>Demandes d'inscription en attente</h2>
    <table>
        <thead>
        <tr>
            <th>Nom Complet</th>
            <th>Email</th>
            <th>Promotion</th>
            <th>Matricule</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <!-- PHP pour récupérer et afficher les demandes en attente -->
        <?php
        // Connexion à la base de données (utiliser PDO ou MySQLi)
        $host = 'localhost';
        $dbname = 'pro';
        $username = 'root';
        $password = '';

        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Sélectionner les demandes en attente
            $query = "SELECT id, nom_complet, email, promotion, matricule FROM inscription_requests WHERE statut = 'en_attente'";
            $stmt = $db->query($query);
            $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($requests as $request) {
                echo "<tr>";
                echo "<td>{$request['nom_complet']}</td>";
                echo "<td>{$request['email']}</td>";
                echo "<td>{$request['promotion']}</td>";
                echo "<td>{$request['matricule']}</td>";
                echo "<td>";
                echo "<form method='post' action='Demandess.php'>";
                echo "<input type='hidden' name='request_id' value='{$request['id']}'>";
                echo "<button type='submit' name='action' value='accepter'>Accepter</button>";
                echo "<button type='submit' name='action' value='refuser'>Refuser</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }

        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
