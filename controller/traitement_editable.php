<?php
    session_start();

    include 'utils.php';
    
    $value = $_POST['value'];
    $pk = $_POST['pk'];
    echo $value, $pk;

    // update_volData('qualif', $etape, $id_vol);
?>