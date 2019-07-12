<?php
    session_start();

    include '../controller/utils.php';
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $statut = $_POST['statut'];

    if (!isset($_POST['nom']))
    {
        $erreur . = 'nom';
    }

    else if (!isset($_POST['prenom']))
    {
        $erreur = .';prenom';
    }

    else if (!isset($_POST['email']))
    {
        $erreur = .';email';
    }

    else if (!isset($_POST['prenom']))
    {
        $erreur = .';statut';
    }

    
    $verif = add_utilisateurData($nom, $prenom, $email, $statut);

    if($verif == 1) // Authetification incorrecte
    {
        header('Location: ../pages/inscription.php?erreur='".$erreur."'');
    } 
    
    else if ($verif == 0)
    {
        header('Location: ../pages/connexion.php');
    }
?>