<?php
    session_start();

    include 'utils.php';
    
    $id_avion = $_POST['id_avion'];

    $OACI_dep = $_POST['OACI_dep'];
    $date_debut = $_POST['date_debut'];

    $OACI_arr = $_POST['OACI_arr'];
    $date_arr = $_POST['date_arr'];

    $qualif = $_POST['qualif'];
    $commentaires = $_POST['commentaires'];

    $id_vol = insert_volData($_SESSION['id_utilisateur'], $id_avion, $qualif, $commentaires);

    if ($_POST['OACI_int'] != "")
    {
        // Première ligne
        $OACI_int = $_POST['OACI_int'];
        $temp_date = $date_debut;
        insert_routeData($OACI_dep, $OACI_int, $date_debut, $temp_date, $id_vol);

        // Seconde ligne ligne
        insert_routeData($OACI_int, $OACI_arr, $date_debut, $date_arr, $id_vol);
    }

    else
    {
        insert_routeData($OACI_dep, $OACI_arr, $date_debut, $date_arr, $id_vol);
    }

    echo '<p>'.$id_avion.'</p>';

    echo '<p>'.$OACI_dep.'</p>';
    echo '<p>'.$date_debut.'</p>';

    echo '<p>'.$OACI_arr.'</p>';
    echo '<p>'.$date_arr.'</p>';

    echo '<p>'.$OACI_int.'</p>';

    echo '<p>'.$qualif.'</p>';
    echo '<p>'.$commentaires.'</p>';

    echo $id_vol;

    echo '<p></p>';

    header('Location: ../pages/mes_vols/ajouter_un_vol.php?ajoute');
?>