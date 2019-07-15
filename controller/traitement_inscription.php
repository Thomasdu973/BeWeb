<?php
    session_start();

    include 'utils.php';
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $statut = $_POST['statut'];

    $verif = add_utilisateurData($nom, $prenom, $email, $statut);

    if($verif == 0) // L'email est déjà utilisé
    {
        header('Location: ../pages/inscription.php?erreur');
    } 
    
    else if ($verif == 1)
    {
        header('Location: ../pages/connexion.php');
    }
?>