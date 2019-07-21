<?php
    session_start();

    include 'utils.php'; 
    
    $date_debut_intervalle = $_POST['date_debut_intervalle'];
    $date_fin_intervalle = $_POST['date_fin_intervalle'];
    $id_utilisateur = $_SESSION['id_utilisateur'];

    
    // // echo $champ, $value, $pk, $id_utilisateur;

    $tableau = calcul_heures($id_utilisateur, $date_debut_intervalle, $date_fin_intervalle);

    echo json_encode($tableau);
?>