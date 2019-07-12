<?php
    session_start();

    include '../controller/utils.php';
    
    if (empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['email']) && empty($_POST['mdp']))
    {
        header('Location: ../pages/inscription.php?vide');
    }

    else if (empty($_POST['email']))
    {
        header('Location: ../pages/inscription.php?email');
    }

    else
    {
        if (empty($_POST['mdp']))
        {
            header('Location: ../pages/inscription.php?mdp');
        }

        else
        {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $statut = $_POST['statut'];
            
            if($verif == 0) // Authetification incorrecte
            {
                header('Location: ../pages/inscription.php?erreur');
            } 
            
            else 
            {
                header('Location: ../pages/connexion.php');
            }
        }
    }
?>