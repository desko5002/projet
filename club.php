<?php require_once 'Text.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="club.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>



    <link rel="icon" href="club.ico" type="image/png">
    <title>Club</title>

</head>
<div class="boss">
    <body class="body">
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=pro', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $page = $_GET['page'] ?? 1;

    if (!filter_var($page, FILTER_VALIDATE_INT)) {
        throw new Exception('Numero de page invalide');

    }
    if($page === '1'){
        header('location: club.php');
        http_response_code(301);
        exit();
    }

    $currentPage = (int)$page;
    if ($currentPage <= 0){
        throw new Exception('Numero de page invalide');
    }
    $count = (int)$pdo->query('SELECT COUNT(nom_club) FROM club')->fetch(PDO::FETCH_NUM)[0];
    $perPage = 9;
    $pages =ceil($count / $perPage) ;
    if ($currentPage > $pages){
        throw new Exception('Cette page nexiste pas');
    }
    $offset = $perPage * ($currentPage - 1);
    $query = $pdo->query("SELECT * FROM club LIMIT $offset, $perPage");
    $posts = $query->fetchAll(PDO::FETCH_OBJ)
    ?>
    <header class="header">
        <img src="jodom@2x.png" alt="logo" width="150px" >
        <nav class="nav">
            <li class="accueil li" ><a href="home.php">Accueil</a></li>
            <li class="li"><a href="actualité.php">Actualités</a></li>
            <li class="li"><a href="club.php">Club</a></li>
            <li class="li"><a href="contacter.php" >Contacter</a></li>
            <li class="li"><a href="connexion.php">Connexion</a></li>
        </nav>
        <div class="burger-container">
            <div class="burger"></div>
        </div>
    </header>
    <section class="section1">
        <div class="div1"><span class="span1">FAIS TOI</span> PLAIZ<span class="span2">!</span></div>
    </section>
    <section class="sectionx">
        <div class="row">
            <?php foreach($posts as $post): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlentities($post->nom_club) ?></h5>
                            <div class="image">
                                <img src="<?= htmlentities($post->image) ?>" alt="<?= htmlentities($post->nom_club) ?>" class="img-fluid">
                            </div>
                            <p><?= nl2br(htmlentities(Text::excerpt($post->description))) ?></p>
                            <p>
                                <a href="<?= htmlentities($post->lien) ?>" class="btn btn-primary">voir plus</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="pagination">
            <?php
            echo "<a href='?page=1'>1</a>&nbsp;";
            for ($i = 2; $i <= $pages; $i++) {
                echo "<a href='?page=$i'>$i</a>&nbsp;";
            }
            ?>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

</div>

</html>