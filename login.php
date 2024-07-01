<?php
session_start();

if (isset($_POST['formlogin'])) {
    extract($_POST);

    // Vérifier si l'email et le mot de passe sont remplis
    if (!empty($lemail) && !empty($lpassword)) {
        // Préparer la requête pour obtenir l'utilisateur avec l'email donné
        $q = $db->prepare("SELECT * FROM users WHERE mail = :email");
        $q->execute(['email' => $lemail]);
        $result = $q->fetch();

        // Si l'utilisateur existe
        if ($result) {
            $hashpassword = $result['password'];

            // Vérifier si le mot de passe correspond au hash
            if (password_verify($lpassword, $hashpassword)) {
                // Démarrer la session et rediriger l'utilisateur vers la page d'accueil
                $_SESSION['loggedin'] = true;
                header("Location: \projetX\dashmin-1.0.0[1]\dashmin-1.0.0\blank.php");
                exit;
            } else {
                // Mot de passe incorrect
            }
        } else {
            // Utilisateur non trouvé
        }
    } else {
        // Email ou mot de passe vide
    }
}
?>
