<?php
    session_start();

    include 'utils.php';
    
    $id_avion = $_POST['id_avion'];

    $OACI_dep = $_POST['OACI_dep'];
    $date_debut = $_POST['date_debut'];

    $OACI_arr = $_POST['OACI_arr'];
    $date_arr = $_POST['date_arr'];

    $OACI_int = $_POST['OACI_int'];

    $qualif = $_POST['qualif'];
    $commentaires = $_POST['commentaires'];

    echo '<p>'.$id_avion.'</p>';

    echo '<p>'.$OACI_dep.'</p>';
    echo '<p>'.$date_debut.'</p>';

    echo '<p>'.$OACI_arr.'</p>';
    echo '<p>'.$date_arr.'</p>';

    echo '<p>'.$OACI_int.'</p>';

    echo '<p>'.$qualif.'</p>';
    echo '<p>'.$commentaires.'</p>';

    // if($verif == 0) // L'email est déjà utilisé
    // {
    //     header('Location: ../pages/inscription.php?erreur');
    // } 
    
    // else if ($verif == 1)
    // {
    //     header('Location: ../pages/connexion.php');
    // }
?>