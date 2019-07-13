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

function get_VolData()
{
    $dbh = connexion();
    $tab = array();
    $sql = "SELECT * FROM vol JOIN route ON vol.id_vol=route.id_vol; ";
    $sth = $dbh -> prepare($sql);
    $sth -> execute();
    
    while($result = $sth -> fetch(PDO::FETCH_OBJ))
    {
        $tab[] = $result;
    }

    $sth -> closeCursor();
    return $tab;
}

function get_aerodromeData()
{
    $dbh = connexion();
    $tab = array();
    $sql = "SELECT * FROM aerodrome ";
    $sth = $dbh -> prepare($sql);
    $sth -> execute();
    
    while($result = $sth -> fetch(PDO::FETCH_OBJ))
    {
        $tab[] = $result;
    }

    $sth -> closeCursor();
    return $tab;
}

function get_avionsData()
{
    $dbh = connexion();
    $tab = array();
    $sql = "SELECT * FROM avions JOIN compagnie ON avions.id_compagnie=compagnie.id_compagnie ";
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