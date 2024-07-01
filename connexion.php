

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <link rel="icon" href="club.ico" type="image/png">

    <title>Connexion</title>
</head>
<body>
    <?php
        include 'database.php';
        global $db;
    
    ?>
    <section>
    <div class="login-box">
        <form method="post">
            <img src="jodom@2x.png" alt="logo" width="150px" >
            <div class="input-box">
                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                <input type="email" name="lemail" id="lemail" required>
                <label >Adresse mail</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" name="lpassword" id="lpassword" required>
                <label >Mot de passe</label>
            </div>
            <div class="remember-forgot">
                <label ><input type="checkbox"> Se rappeler</label>
            </div>
            <button type="submit" name="formlogin" id="formlogin">Se connecter</button>
            
        </form>
        <?php include 'login.php';?>

    </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>