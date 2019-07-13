<?php
    session_start();

    include 'utils.php';
    
    $former_mdp = $_POST['former_mdp'];
    $new_mdp = $_POST['new_mdp'];
    $new_mdp_check = $_POST['new_mdp_check'];

    if ($new_mdp != $new_mdp_check) // Les deux entrées sont différentes
    {
        header('Location: ../pages/mise_a_jour_mdp.php?erreur');
    }

    else
    {
        $verif = update_utilisateurData('mot_passe', $new_mdp, $_SESSION['id_utilisateur']);

        if ($verif == 0) // Le nouveau mot de passe et l'ancien sont identiques
        {
            header('Location: ../pages/mise_a_jour_mdp.php?idem');
        }

        else
        {
            echo "error";
            update_utilisateurData('actif', '1', $_SESSION['id_utilisateur']);
            deconnecter_utilisateur();
            header('Location: ../pages/connexion.php');
        }
    }
?>