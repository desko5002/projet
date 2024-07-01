<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête SQL pour récupérer les données
$sql = "SELECT YEAR(datecreation) AS annee, MONTH(datecreation) AS mois, COUNT(*) AS nombre_evenements
        FROM evenements
        GROUP BY YEAR(datecreation), MONTH(datecreation)
        ORDER BY annee, mois";

$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 résultats";
}
$conn->close();

// Retourner les données en format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
