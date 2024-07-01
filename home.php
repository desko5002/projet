<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les 3 derniers événements
$sql = "SELECT photo FROM evenements ORDER BY datecreation DESC LIMIT 3";
$result = $conn->query($sql);

$photos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $photos[] = $row['photo'];
    }
} else {
    echo "0 results";
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="home.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <link rel="icon" href="club.ico" type="image/png">
    <title>Accueil</title>

</head>

<body class="body">
 <div class="boss">
    <header class="header">
        <img src="jodom@2x.png" alt="logo" width="150px" >
        <nav class="nav">
            <li id="accueil" class="accueil li"><a href="home.php">Accueil</a></li>
            <li id="actualites" class="li"><a href="actualité.php">Actualités</a></li>
            <li id="club" class="li"><a href="club.php">Club</a></li>
            <li id="contacter" class="li"><a href="contacter.php">Contacter</a></li>
            <li id="connexion" class="li"><a href="connexion.php">Connexion</a></li>
        </nav>

        <div class="burger-container">
            <div class="burger"></div>
        </div>
    </header>



    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="IMG_0965.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="oluwatobi-fasipe-e8etaVo85AY-unsplash.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="jodom@2x.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section class="section2">
        <div class="login-box">

        </div>
        <div class="div5">
            <h1 class="h1">
                L'institut UCAC-ICAM ?
            </h1>
            <p class="p1">
                L'Institut Ucac-Icam est le fruit d'un partenariat  entre deux institutions renommées dans l'enseignement supérieur : l'Université
                Catholique d'Afrique Centrale (UCAC) et l'Institut Catholique d'Arts et Métiers (ICAM).

                UCAC (Université Catholique d'Afrique Centrale) : Basée à Yaoundé, au Cameroun, l'UCAC est une université catholique privée
                qui propose une gamme de programmes universitaires dans divers domaines, y compris les sciences, les arts, la gestion.
                <button class="button1" id="redirect-button">En savoir plus</a></button>

            </p>

        </div>

    </section>
    <section class="section3">
        <h1 class="h1">La vie estudiantine à l'institut ?</h1>
        <p class="p2">L'Institut UCAC-ICAM offre une gamme variée d'activités extrascolaires pour enrichir l'expérience des étudiants, allant des sports aux arts et aux initiatives académiques et sociales. Les clubs étudiants, tels que ceux de robotique et de culture, permettent de développer des compétences en leadership et en travail d'équipe tout en participant à des projets innovants et inclusifs. En outre, les initiatives de bénévolat et les projets communautaires encouragent les étudiants à contribuer positivement à la société et à développer une conscience sociale.</p>
    </section>
    <section class="mince">
        <div class="div6">
            <div class="div7 a">
                <p class="p0">Club danse</p>
                <a href="da.php">En savoir plus</a>

            </div >
            <div  class="div7 b">
                <p class="p0">Club multimedia</p>
                <a href="">En savoir plus</a>

            </div>
            <div  class="div7 c">
                <p class="p0">Club mode</p>
                <a href="">En savoir plus</a>

            </div>
            <div  class="div7 d">
                <p class="p0">Club musique</p>
                <a href="">En savoir plus</a>

            </div>
            <div  class="div7 e">
                <p class="p0">Club innotech</p>
                <a href="">En savoir plus</a>

            </div>
        </div>

    </section>



    <section class="section4">
        <h2 class="hu"><span class="A">A</span> La Une<span class="point">.</span></h2><span></span>
        <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php if (count($photos) > 0): ?>
                    <?php foreach ($photos as $index => $photo): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <img class="d-block2 w-100" src="<?php echo $photo; ?>" alt="Slide <?php echo $index + 1; ?>">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="carousel-item active">
                        <img class="d-block2 w-100" src="default1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block2 w-100" src="default2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block2 w-100" src="default3.jpg" alt="Third slide">
                    </div>
                <?php endif; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </section>

    <footer id="footer" class="footer">
        <span class="copyrights">&copy; 2024 - Club</span>
        <a href="mentions.php" class="conditions">Mentions-Légales</a>
    </footer>
    <script>
        const burgerContainer = document.querySelector('.burger-container');
        const navLinks = document.querySelector('.nav');

        burgerContainer.addEventListener('click', () => {
            burgerContainer.classList.toggle('active');
            navLinks.classList.toggle('active');
        })
    </script>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



 </div>

</body>
</html>