<?php
    session_start();

    include 'utils.php';
    
    $champ = $_POST['name'];
    $value = $_POST['value'];
    $pk = $_POST['pk'];


    echo $champ, $value, $pk;

    update_volData($champ, $value, $pk);


    // echo ('[{value: 1, text: "text1"}, {value: 2, text: "text2"}]');
?>