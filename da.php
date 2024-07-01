<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="da.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>



    <link rel="icon" href="club.ico" type="image/png">
    <title>Accueil</title>

</head>
<body class="body">
<div class="boss">
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
        <div class="div1"><span class="span1">FAIS</span> LE MOVE<span class="span2">.</span></div>
    </section>
    <section class="section10">
        <h2>Le Club Danse ?</h2>
        <div class="divc">
            <div class="divo">
                <p class="px">Le club de danse de l'Institut UCAC ICAM est bien plus qu'un simple lieu où les étudiants se réunissent pour bouger sur de la musique. C'est un espace où les passions s'expriment, où les talents se révèlent et où les liens se tissent au rythme des mouvements. Depuis sa création, ce club incarne l'esprit de diversité et d'inclusion qui caractérise l'institut, offrant à chacun la possibilité de s'exprimer à travers la danse, indépendamment de son niveau de compétence ou de son bagage culturel.
                </p>

            </div>
            <div class="divb">
                <div class="divx j">
                    <p>Du Fun</p>

                </div>
                <div class="divx i">
                    <p>De La Move</p>


                </div >
                <div class="divx k">
                    <p>Du Groove</p>

                </div>
            </div>
    </section>






    <section class="section3">
        <h1 class="h1">Le Bureau</h1>
    </section>
    <section>
        <div class="div6">
            <div class="div7 a">
                <p class="p0">Jean Francois</p>
                <a href="">Président</a>

            </div >
            <div  class="div7 b">
                <p class="p0">Lyne Pricil</p>
                <a href="">Sécrétaire</a>

            </div>
            <div  class="div7 c">
                <p class="p0">Bernard Dupont</p>
                <a href="">Comptable</a>

            </div>
            <div  class="div7 d">
                <p class="p0">Patrick Mboma</p>
                <a href="">Vice président</a>

            </div>
            <div  class="div7 e">
                <p class="p0">Leonard Dicapri</p>
                <a href="">Evènementiel</a>

            </div>
        </div>


    </section>


    <section class="section4">
        <h2 class="hu"><span class="A">Nos</span> Points Forts<span class="point">.</span></h2><span></span>
    </section>
    <section id="delivery" class="delivery-container">
        <div class="shop">
            <i class="delivery-icon fas fa-calendar"></i>
            <p class="box-content">
                10 Evènements par an
            </p>
        </div>
        <div class="withdrawal">
            <i class="delivery-icon fas fa-child icon"></i>
            <p class="box-content">
                20 Championnats gagnés
            </p>
        </div>
        <div class="delivery">
            <i class="delivery-icon fas fa-user-friends icon"></i>
            <p class="box-content">
                50 Etudiants par an
            </p>
        </div>

    </section>
    <section class="section8">
        <p>Pour envoyer une demande d'adhésion au club: </p>
        <button class="button1" id="redirect-button">Cliquez ici</a></button>

    </section>

    <footer id="footer" class="footer">
        <span class="copyrights">&copy; 2024 - Club</span>
        <a href="file:///C:/Users/JODOM/Downloads/Vos%20Mentions%20L%C3%A9gales-806135000001164005.pdf" class="conditions">Mentions-Légales</a>
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
    <script src="da.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</div>


</body>
</html>