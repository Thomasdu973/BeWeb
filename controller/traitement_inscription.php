<?php
    session_start();

    include '../controller/utils.php';
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $statut = $_POST['statut'];
    $erreur = "";

    if (empty($_POST['nom']))
    {
        $erreur .= 'nom';
    }

    if (empty($_POST['prenom']))
    {
        $erreur .= ';prenom';
    }

    if (empty($_POST['email']))
    {
        $erreur .=';email';
    }

    if (empty($_POST['prenom']))
    {
        $erreur .=';statut';
    }

    header('Location: ../pages/inscription.php?erreur='.$erreur);

    // $verif = add_utilisateurData($nom, $prenom, $email, $statut);

    // if($verif == 1) // Authetification incorrecte
    // {
    //     header('Location: ../pages/inscription.php?erreur='.$erreur);
    // } 
    
    // else if ($verif == 0)
    // {
    //     header('Location: ../pages/connexion.php');
    // }
?>