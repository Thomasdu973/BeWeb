<?php
    session_start();

    include 'utils.php';

    $id_vol = $_POST['id_vol'];
    
    supprimer_vol($id_vol);

    echo($id_vol);
?>