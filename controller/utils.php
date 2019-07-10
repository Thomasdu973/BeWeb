<?php
   // Connexion à la base de donnée
   function connect_db()
   {
      $db_username = 'phpmyadmin';
      $db_password = 'YES';
      $db_name     = 'be_isesa18';
      $db_host     = 'localhost';
      $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
         or die("Erreur lors de la connexion à la base de donnée: %s\n". mysqli_connect_error());

      if (!$db)
         echo "<p>Erreur de connexion à la base de donnée</p>";
      
      else
         return $db;
   }

   // Fermer la connexion à la base de donnée
   function disconnect_db($db)
   {
      $db = mysqli_close();
   }
?>