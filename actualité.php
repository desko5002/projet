<?php require_once 'Text.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="actualité.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>



    <link rel="icon" href="club.ico" type="image/png">
    <title>Evenements</title>


</head>
<body class="body">
<?php
$pdo = new PDO('mysql:host=localhost;dbname=pro', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$page = $_GET['page'] ?? 1;
$search = $_GET['search'] ?? '';



$currentPage = (int)$page;

if ($currentPage <= 0) {
    $currentPage = 1;
}


$whereClause = '';
$params = [];

if (!empty($search)) {
$whereClause = 'WHERE nom LIKE :search';
$params[':search'] = "%$search%";
}

$countQuery = 'SELECT COUNT(id) FROM evenements ' . $whereClause;
$countStmt = $pdo->prepare($countQuery);
$countStmt->execute($params);
$count = (int)$countStmt->fetch(PDO::FETCH_NUM)[0];

$perPage = 9;
$pages = ceil($count / $perPage);



$offset = $perPage * ($currentPage - 1);
$query = 'SELECT * FROM evenements ' . $whereClause . ' ORDER BY datecreation DESC LIMIT :offset, :perPage';
$stmt = $pdo->prepare($query);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
if (!empty($search)) {
$stmt->bindParam(':search', $params[':search'], PDO::PARAM_STR);
}
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<div class="boss">
    <header class="header">
        <img src="jodom@2x.png" alt="logo" width="150px" >
        <nav class="nav">
            <li class="accueil li" ><a href="home.php">Accueil</a></li>
            <li id="actualites" class="li"><a href="actualité.php">Actualités</a></li>
            <li class="li"><a href="club.php">Club</a></li>
            <li class="li"><a href="contacter.php" >Contacter</a></li>
            <li class="li"><a href="connexion.php">Connexion</a></li>
        </nav>
        <div class="burger-container">
            <div class="burger"></div>
        </div>
    </header>

    <section class="section1">
        <div class="div1"><span class="span1">VIENS</span> DECOUVRIR<span class="span2">.</span></div>
    </section>
    <section class="lom">
        <nav class="desko">
            <li class="e"><a href="actualité.php">Toutes les publications</a></li>
            <li class="e"><a href="actualitéclub.php">Actualités club</a></li>
            <li class="e"><a href="actualitécampus.php">Actualités campus</a></li>
            <li class="e"><a href="actualitéextras.php">Actualités extras</a></li>
        </nav>

    </section>
    <section class="search-section">
        <form method="GET" action="actualité.php" class="form-inline">
            <input type="text" name="search" class="form-control mr-sm-2" placeholder="Rechercher un événement" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
    </section>

    <section class="sectionx">

        <div class="row">



                <?php foreach ($posts as $post): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlentities($post->nom) ?></h5>
                                <?php $date = new DateTime($post->datecreation); ?>
                                <p class="text-muted"><?= $date->format('d/m/Y') ?></p>
                                <div class="image">
                                    <img src="<?= htmlentities($post->photo) ?>" alt="<?= htmlentities($post->nom) ?>" class="img-fluid">
                                </div>
                                <p><?= nl2br(htmlentities(Text::excerpt($post->description))) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
        </div>
        <div class="pagination">
            <?php
            if ($pages > 1) {
                echo "<a href='actualité.php?page=1&search=" . urlencode($search) . "'>1</a>&nbsp;";
                for ($i = 2; $i <= $pages; $i++) {
                    echo "<a href='actualité.php?page=$i&search=" . urlencode($search) . "'>$i</a>&nbsp;";
                }
            }
            ?>
    </section>









    <footer id="footer" class="footer">
        <span class="copyrights">&copy; 2024 - Club</span>
        <a href="#" class="conditions">Mentions-Légales</a>
    </footer>
    <script>
        const burgerContainer = document.querySelector('.burger-container');
        const navLinks = document.querySelector('.nav');

        burgerContainer.addEventListener('click', () => {
            burgerContainer.classList.toggle('active');
            navLinks.classList.toggle('active');
        })
    </script>
    <script>
        // Récupérer l'URL actuelle
        var currentURL = window.location.pathname;

        // Vérifier si l'URL actuelle correspond à 'actualité.php'
        if (currentURL.includes("actualité.php")) {
            // Ajouter la classe 'active' à l'élément de liste correspondant
            document.getElementById("actualites").classList.add("active");
        }
    </script>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="home.js"></script>
    <script src="script1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</div>

</body>
</html>