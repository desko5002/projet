<?php
// Démarrer la session
session_start();

// Détruire toutes les données de session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion ou une autre page après la déconnexion
header("Location: \projetX\home.php");
exit;
?>