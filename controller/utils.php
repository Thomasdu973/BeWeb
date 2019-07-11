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

   function verif_auth($email, $mdp)
   {
      // Protection contre les injections SQL
      $email = htmlentities($_POST['email'], ENT_QUOTES, "ISO-8859-1");
      $mdp = htmlentities($_POST['mdp'], ENT_QUOTES, "ISO-8859-1");

      // Coonexion à la base de donnée
      $mysqli = connect_db();

      // Requête à la base de donnée
      $reponse = mysqli_query($mysqli,"SELECT * FROM utilisateur WHERE email = '".$email."' AND mot_passe = '".$mdp."'");
      
      // Deconnexion à la base de donnée
      disconnect_db($db);

      // Si il y a un résultat, mysqli_num_rows() nous donnera alors 1
      // Si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
      return mysqli_num_rows($reponse);
   }

   function init_session($email)
   {
      // Coonexion à la base de donnée
      $mysqli = connect_db();

      // Requête à la base de donnée
      $reponse = mysqli_query($mysqli,"SELECT * FROM utilisateur WHERE email = '".$email."'");

      $donnee = mysqli_fetch_assoc($reponse);

      // Initialisation des variables de session
      $_SESSION['nom'] = $donnee['nom'];
      $_SESSION['prenom'] = $donnee['prenom'];
      $_SESSION['id_utilisateur'] = $donnee['id_utilisateur'];
      $_SESSION['email'] = $donnee['email'];
      $_SESSION['statut'] = $donnee['statut'];
      $_SESSION['actif'] = $donnee['actif'];
      echo $_SESSION_['nom'];

      // Deconnexion à la base de donnée
      disconnect_db($db);
   }
?>