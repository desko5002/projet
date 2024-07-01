<?php
session_start();

// Vérifier si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: connexion.php");
    exit;
}
?>


<?php
// Établir la connexion à la base de données (exemples avec PDO)
$host = 'localhost'; // Votre hôte MySQL
$dbname = 'pro'; // Nom de votre base de données
$username = 'root'; // Votre nom d'utilisateur MySQL
$password = ''; // Votre mot de passe MySQL (devrait être sécurisé en production)

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour compter le nombre d'enregistrements dans la table club
    $query_clubs = "SELECT COUNT(*) as total_clubs FROM club";
    $stmt_clubs = $db->query($query_clubs);
    $row_clubs = $stmt_clubs->fetch(PDO::FETCH_ASSOC);
    $total_clubs = $row_clubs['total_clubs'];

    // Requête pour compter le nombre d'enregistrements dans la table evenements
    $query_evenements = "SELECT COUNT(*) as total_evenements FROM evenements";
    $stmt_evenements = $db->query($query_evenements);
    $row_evenements = $stmt_evenements->fetch(PDO::FETCH_ASSOC);
    $total_evenements = $row_evenements['total_evenements'];


    $query_inscrits = "SELECT COUNT(*) as total_inscrits FROM inscritsdanse";
    $stmt_inscrits = $db->query($query_inscrits);
    $row_inscrits = $stmt_inscrits->fetch(PDO::FETCH_ASSOC);
    $total_inscrits = $row_inscrits['total_inscrits'];

    // Fermer la connexion à la base de données (facultatif mais recommandé)
    $db = null;

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="graphique.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Welcome!</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="blank.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Bord</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-users me-2"></i>Club</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../../addclub.php" class="dropdown-item">Ajouter</a>
                            <a href="../../deleteclub.php" class="dropdown-item">Supprimer</a>
                        </div>
                    </div>
                    <a href="Demands.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Demandes</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Evenements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../../addevent.php" class="dropdown-item">Ajouter</a>
                            <a href="../../deleteevent.php" class="dropdown-item">Supprimer</a>
                        </div>
                    </div>
                    <a href="deconnexion.php" class="nav-item nav-link"><i class="fa fa-sign-out-alt me-2"></i>Deconnexion</a>


                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars" style="color: orange;"></i>
                </a>
                
                
            </nav>
            <!-- Navbar End -->


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="div6">
                        <div class="div7 a">
                          <p class="p0">NOMBRE TOTAL D'ETUDIANTS INSCRITS</p>
                          <p class="p12"><?php echo $total_inscrits; ?></p>
                          
                
                        </div >
                        <div  class="div7 b">
                          <p class="p0">NOMBRE TOTAL DE CLUBS SUR LE SITE</p>
                          <p class="p12"><?php echo $total_clubs; ?></p>
                
                        </div>
                        <div  class="div7 c">
                          <p class="p0">NOMBRE TOTAL D'EVENEMENTS SUR LE SITE</p>
                          <p class="p12"><?php echo $total_evenements; ?></p>
                
                        </div>
                    </div>
                    <div id="dashboard" class="section1">
                        <h2>Graphique du nombre d'événements par période</h2>
                        <canvas id="graphiqueEvenements"></canvas>
                    </div>

                    
                    
                </div>
            </div>
            <!-- Blank End -->


            <!-- Footer Start -->
            
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="graphique.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>