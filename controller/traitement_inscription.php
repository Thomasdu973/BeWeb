<?php
    session_start();

    include '../controller/utils.php';
    
    if (empty($_POST['email']) && empty($_POST['mdp']))
    {
        header('Location: ../pages/inscription.php?ident');
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
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $verif = verif_auth($email, $mdp);
            
            if($verif == 0) // Authetification incorrecte
            {
                header('Location: ../pages/inscription.php?erreur');
            } 
            
            else 
            {
                // On initialise les variables de session
                init_session($email);
                // echo "id_utilisateur : ".$_SESSION['id_utilisateur'].' nom : '.$_SESSION['nom'].' Prenom : '.$_SESSION['prenom'].' email : '.$_SESSION['email']
                // .' Status : '.$_SESSION['statut'].' Actif : '.$_SESSION['actif'];
                header('Location: ../pages/tableau_bord.php');
            }
        }
    }
?>