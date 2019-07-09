<?php
require_once("config.php");

function connexion()
{
    try
    {
        $connStr = "mysql:host=".NOM_SERV_BD.";dbname=".NOM_BD;
        $dbh = new PDO($connStr, LOGIN_BD, MDP8BD, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND =>
            "SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'"
        ));
    }

    catch (PDOException $e)
    {
        echo'Connection falied: '.$e->getMessage();
        return "fail";
    }

    return $dbh;
}

function getAllFlights()
{
    $dbh = connexion();
    $tab = array();
    $sql = "SELECT * FROM aerodrome";
    $sth = $dbh -> prepare($sql);
    $sth -> execute();
    
    while($result = $sth -> fetch(PDO::FETCH_OBJ))
    {
        $tab[] = $result;
    }

    $sth -> closeCursor();
    return $tab;
}

?>