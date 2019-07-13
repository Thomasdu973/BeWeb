<?php
    session_start();

    include 'utils.php';
    
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $verif = verif_auth($email, $mdp);
    
    if($verif == 0) // Authetification incorrecte
    {
        header('Location: ../pages/connexion.php?erreur');
    } 
    
    else 
    {
        // On initialise les variables de session
        init_session($email);
        // echo "id_utilisateur : ".$_SESSION['id_utilisateur'].' nom : '.$_SESSION['nom'].' Prenom : '.$_SESSION['prenom'].' email : '.$_SESSION['email']
        // .' Status : '.$_SESSION['statut'].' Actif : '.$_SESSION['actif'];

        if ($_SESSION['actif'] == 2) // Nécessité de mettre à jour son mot de passe
        {
            header('Location: ../pages/mise_a_jour_mdp.php');
        }

        else // L'utilisateur a déjà mis à jour son mot de passe
        {
            header('Location: ../pages/tableau_bord.php');
        }
    }
?>