<?php
    include 'utils.php';

    $num = $_POST['num'];

    switch($num)
    {
        case 1:
        $id_vol = $_POST['id_vol'];
        deleteVolData($id_vol);
        break;
    }

?>