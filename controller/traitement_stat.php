<?php
    session_start();

    include 'utils.php'; 
    
    $champ = $_POST['name'];
    $value = $_POST['value'];
    $pk = $_POST['pk'];
    $id_utilisateur = $_SESSION['id_utilisateur'];

    

    // // echo $champ, $value, $pk, $id_utilisateur;

    $tableau = calcul_heures($id_utilisateur, '2019-01-01', '2020-01-01');

    $heuresDeVol = array
    (
        array(jour=> "02", vol => 72),
        array(jour=> "03", vol => 34),
        array(jour=> "04", vol => 77),
        array(jour=> "05", vol => 12),
        array(jour=> "06", vol => 7)
    );
    // echo '<p></p>';
    echo json_encode($tableau);
    
?>