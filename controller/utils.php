<?php
   ////////////////////////////////////////////////////////////////////////////////////
   function deconnecter_utilisateur()
   {
      session_unset();
      session_destroy();
      session_write_close();
      setcookie(session_name(),'',0,'/');
      session_regenerate_id(true);
   }

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

   ////////////////////////////////////////////////////////////////////////////////////
   // Fermer la connexion à la base de donnée
   function disconnect_db($db)
   {
      $db = mysqli_close();
   }

   ////////////////////////////////////////////////////////////////////////////////////
   function verif_auth($email, $mdp)
   {
      // Protection contre les injections SQL
      $email = htmlentities($email, ENT_QUOTES, "ISO-8859-1");
      $mdp = htmlentities($mdp, ENT_QUOTES, "ISO-8859-1");

      // Connexion à la base de donnée
      $mysqli = connect_db();

      // Requête à la base de donnée
      $reponse = mysqli_query($mysqli,"SELECT * FROM utilisateur WHERE email = '".$email."' AND mot_passe = '".$mdp."'");
      
      // Deconnexion à la base de donnée
      disconnect_db($mysqli);

      // Si il y a un résultat, mysqli_num_rows() retourne 1
      // Si mysqli_num_rows() retourne 0, aucun résultat
      return mysqli_num_rows($reponse);
   }

   ////////////////////////////////////////////////////////////////////////////////////
   function init_session($email)
   {
      // Protection contre les injections SQL
      $email = htmlentities($email, ENT_QUOTES, "ISO-8859-1");

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

      // Deconnexion à la base de donnée
      disconnect_db($mysqli);
   }

   ////////////////////////////////////////////////////////////////////////////////////
   function motDePasse($longueur=10) { // par défaut, on affiche un mot de passe de 10 caractères
       // chaine de caractères qui sera mis dans le désordre:
       $Chaine = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // 62 caractères au total
       // on mélange la chaine avec la fonction str_shuffle(), propre à PHP
       $Chaine = str_shuffle($Chaine);
       // ensuite on coupe à la longueur voulue avec la fonction substr(), propre à PHP aussi
       $Chaine = substr($Chaine,0,$longueur);
       // ensuite on retourne notre chaine aléatoire de "longueur" caractères:
       return $Chaine;
   }

   ////////////////////////////////////////////////////////////////////////////////////
   function envoi_mail($to, $mdp)
   {
      $from = "test@plandevol.com";
      $subject = "Vérification de l'adresse e-mail";
      $message = "Voici votre mot de passe '.$mdp'";
      $headers = "From: ". $from;
      mail($to, $subject, $message, $headers);
   }

   ////////////////////////////////////////////////////////////////////////////////////
   function add_utilisateurData($nom, $prenom, $email, $statut)
   {
      // Protection contre les injections SQL
      $nom = htmlentities($nom, ENT_QUOTES, "ISO-8859-1");
      $prenom = htmlentities($prenom, ENT_QUOTES, "ISO-8859-1");
      $email = htmlentities($email, ENT_QUOTES, "ISO-8859-1");
      $statut = htmlentities($statut, ENT_QUOTES, "ISO-8859-1");

      // Génération du mot de passe
      $mot_passe = motDePasse();

      // Coonexion à la base de donnée
      $mysqli = connect_db();

      // Recherche si l'utilisateur existe déjà
      $requete = "SELECT * FROM utilisateur WHERE email = '".$email."'";
      $reponse = mysqli_query($mysqli, $requete);
      $ligne = mysqli_num_rows($reponse);
      
      if ( $ligne == 1) // L'email exist déjà
      {
         // Deconnexion à la base de donnée
         disconnect_db($mysqli);

         return 0;
      }
         
      else // Si l'utilisateur n'existe pas...
      {
         // Création du nouvel id
         $reponse = mysqli_query($mysqli,"SELECT MAX(id_utilisateur) AS maxId FROM utilisateur");
         $donnee = mysqli_fetch_assoc($reponse);

         $id_utilisateur = $donnee['maxId'] + 1;

         // Le nouvel utilisateur est actif mais doit modifier son mot de passe
         $actif = 2;

         $insert_requete = "INSERT INTO utilisateur (id_utilisateur, nom, prenom, email, mot_passe, statut, actif) 
         VALUE ('".$id_utilisateur."','".$nom."','".$prenom."','".$email."','".$mot_passe."','".$statut."','".$actif."')";

         $reponse = mysqli_query($mysqli, $insert_requete);

         // Envoi du mail
         mail($email, $mdp);

         // Libération de la mémoire
         mysqli_free_result($reponse);

         // Deconnexion à la base de donnée
         disconnect_db($mysqli);
         return 1;
      }
   }

   ////////////////////////////////////////////////////////////////////////////////////
   function update_utilisateurData($champ, $newvalue, $id_utilisateur)
   {
      // Protection contre les injections SQL
      $champ = htmlentities($champ, ENT_QUOTES, "ISO-8859-1");
      $newvalue = htmlentities($newvalue, ENT_QUOTES, "ISO-8859-1");
      $id_utilisateur = htmlentities($id_utilisateur, ENT_QUOTES, "ISO-8859-1");

      // Coonexion à la base de donnée
      $mysqli = connect_db();

      $check_requete = 
      "SELECT ".$champ."
       FROM utilisateur
       WHERE id_utilisateur = '".$id_utilisateur."'";

      $reponse = mysqli_query($mysqli, $check_requete);
      $donnee = mysqli_fetch_assoc($reponse);
      
      echo $donnee['mot_passe'];

      if ($donnee['mot_passe'] == $newvalue) // La nouvelle valeur est la même que l'ancienne
      {
         // Deconnexion à la base de donnée
         disconnect_db($mysqli);
         return 0;
      }

      else  // On peut mettre à jour cette nouvelle valeur
      {
         $update_requete = 
         "UPDATE utilisateur
          SET ".$champ." = '".$newvalue."'
          WHERE id_utilisateur = '".$id_utilisateur."'";

          echo $update_requete;
          $reponse = mysqli_query($mysqli, $update_requete);

         // Libération de la mémoire
         mysqli_free_result($reponse);

         // Deconnexion à la base de donnée
         disconnect_db($mysqli);

         return 1;
      }

   }

   ////////////////////////////////////////////////////////////////////////////////////
   function get_volData($id_utilisateur)
   {
      // Protection contre les injections SQL
      $id_utilisateur = htmlentities($id_utilisateur, ENT_QUOTES, "ISO-8859-1");

      // Coonexion à la base de donnée
      $mysqli = connect_db();

      $sql  = 'SELECT id_vol, id_avion, qualif, commentaires FROM `vol` WHERE id_utilisateur = '.$id_utilisateur.'';

      $reponse = mysqli_query($mysqli, $sql);

      // Mise en forme des données sous forme de sous tableaux associatifs
      $tableau = array();


      while ($donnee = mysqli_fetch_assoc($reponse))
      {
         array_push($tableau, $donnee);
      }

      // Libération de la mémoire
      mysqli_free_result($reponse);

      // Deconnexion à la base de donnée
      disconnect_db($mysqli);

      return $tableau;
   }
?>