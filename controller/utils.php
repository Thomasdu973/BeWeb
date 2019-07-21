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
      $db_password = 'admin';
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
      mysqli_close($db);
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
      
      if ($donnee[$champ] == $newvalue) // La nouvelle valeur est la même que l'ancienne
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

          $reponse = mysqli_query($mysqli, $update_requete);

         // Libération de la mémoire
         mysqli_free_result($reponse);

         // Deconnexion à la base de donnée
         disconnect_db($mysqli);

         return 1;
      }

   }

      ////////////////////////////////////////////////////////////////////////////////////
      function update_volData($champ, $newvalue, $id_vol)
      {
         // Protection contre les injections SQL
         $champ = htmlentities($champ, ENT_QUOTES, "ISO-8859-1");
         $newvalue = htmlentities($newvalue, ENT_QUOTES, "ISO-8859-1");
         $id_vol = htmlentities($id_vol, ENT_QUOTES, "ISO-8859-1");
         
         // Coonexion à la base de donnée
         $mysqli = connect_db();
   
         $check_requete = 
         "SELECT ".$champ."
          FROM vol
          WHERE id_vol = '".$id_vol."'";
   
         $reponse = mysqli_query($mysqli, $check_requete);
         $donnee = mysqli_fetch_assoc($reponse);
         
         if ($donnee[$champ] == $newvalue) // La nouvelle valeur est la même que l'ancienne
         {
            // Deconnexion à la base de donnée
            disconnect_db($mysqli);
            return 0;
         }
   
         else  // On peut mettre à jour cette nouvelle valeur
         {
            $update_requete = 
            "UPDATE vol
             SET ".$champ." = '".$newvalue."'
             WHERE id_vol = '".$id_vol."'";
   
             $reponse = mysqli_query($mysqli, $update_requete);
   
            // Libération de la mémoire
            mysqli_free_result($reponse);
   
            // Deconnexion à la base de donnée
            disconnect_db($mysqli);
   
            return 1;
         }
   
      }

      ////////////////////////////////////////////////////////////////////////////////////
      function update_routeData($champ, $newvalue, $id_vol, $OACI_dep, $OACI_arr)
      {
         // Protection contre les injections SQL
         $champ = htmlentities($champ, ENT_QUOTES, "ISO-8859-1");
         $newvalue = htmlentities($newvalue, ENT_QUOTES, "ISO-8859-1");
         $id_vol = htmlentities($id_vol, ENT_QUOTES, "ISO-8859-1");
         $OACI_dep = htmlentities($OACI_dep, ENT_QUOTES, "ISO-8859-1");
         $OACI_arr = htmlentities($OACI_arr, ENT_QUOTES, "ISO-8859-1");
   
         // Coonexion à la base de donnée
         $mysqli = connect_db();
   
         $check_requete = 
         "SELECT ".$champ."
            FROM route
            WHERE id_vol = '".$id_vol."' AND OACI_dep = '".$OACI_dep."' AND OACI_arr = '".$OACI_arr."'";
   
         $reponse = mysqli_query($mysqli, $check_requete);
         $donnee = mysqli_fetch_assoc($reponse);
         
         if ($donnee[$champ] == $newvalue) // La nouvelle valeur est la même que l'ancienne
         {
            // Deconnexion à la base de donnée
            disconnect_db($mysqli);
            return 0;
         }
   
         else  // On peut mettre à jour cette nouvelle valeur
         {
            $update_requete = 
            "UPDATE route
               SET ".$champ." = '".$newvalue."'
               WHERE id_vol = '".$id_vol."' AND OACI_dep = '".$OACI_dep."' AND OACI_arr = '".$OACI_arr."'";
   
               $reponse = mysqli_query($mysqli, $update_requete);
   
            // Libération de la mémoire
            mysqli_free_result($reponse);
   
            // Deconnexion à la base de donnée
            disconnect_db($mysqli);
   
            return 1;
         }
   
      }

   ////////////////////////////////////////////////////////////////////////////////////
   function insert_volData($id_utilisateur, $id_avion, $qualif, $commentaires)
   {
      // Coonexion à la base de donnée
      $mysqli = connect_db();

      $insert_requete = "INSERT INTO vol (id_utilisateur, id_avion, qualif, commentaires) 
      VALUE ('".$id_utilisateur."','".$id_avion."','".$qualif."','".$commentaires."')";

      $reponse = mysqli_query($mysqli, $insert_requete);

      // Récupération de l'id_vol généré

      $sql  = 'SELECT MAX(id_vol) AS las_id_vol FROM `vol`';

      $reponse = mysqli_query($mysqli, $sql);

      $donnee = mysqli_fetch_assoc($reponse);

      // Libération de la mémoire
      mysqli_free_result($reponse);

      // Deconnexion à la base de donnée
      disconnect_db($mysqli);

      return $donnee['las_id_vol'];
   }

      ////////////////////////////////////////////////////////////////////////////////////
      function insert_routeData($OACI_dep, $OACI_arr, $date_debut, $date_arr, $id_vol)
      {
         echo '<p>'.$OACI_dep.'</p>';
         echo '<p>'.$date_debut.'</p>';

         echo '<p>'.$OACI_arr.'</p>';
         echo '<p>'.$date_arr.'</p>';

         echo '<p>'.$id_vol.'</p>';

         // Coonexion à la base de donnée
         $mysqli = connect_db();
         
         $insert_requete = "INSERT INTO route (OACI_dep, OACI_arr, date_debut, date_arr, id_vol) 
         VALUE ('".$OACI_dep."','".$OACI_arr."','".$date_debut."','".$date_arr."', '".$id_vol."')";
   
         $reponse = mysqli_query($mysqli, $insert_requete);
   
         // Libération de la mémoire
         mysqli_free_result($reponse);
   
         // Deconnexion à la base de donnée
         disconnect_db($mysqli);
      }

   ////////////////////////////////////////////////////////////////////////////////////
   function get_volData($id_utilisateur)
   {
      // Protection contre les injections SQL
      $id_utilisateur = htmlentities($id_utilisateur, ENT_QUOTES, "ISO-8859-1");

      // Coonexion à la base de donnée
      $mysqli = connect_db();

      $sql  = "SELECT DISTINCT * FROM `vol` 
               JOIN route ON vol.id_vol=route.id_vol 
               WHERE id_utilisateur = '".$id_utilisateur."'
               ORDER BY route.id_vol DESC, route.date_arr ASC";

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

   ////////////////////////////////////////////////////////////////////////////////////
   function get_etape($id_utilisateur)
   {
      // Protection contre les injections SQL
      $id_utilisateur = htmlentities($id_utilisateur, ENT_QUOTES, "ISO-8859-1");

      // Coonexion à la base de donnée
      $mysqli = connect_db();
      
      $sql  = 'SELECT OACI_dep, OACI_arr, route.id_vol
               FROM route
               JOIN vol ON route.id_vol = vol.id_vol
               WHERE vol.id_utilisateur = '.$id_utilisateur.'';

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

   ////////////////////////////////////////////////////////////////////////////////////
   function get_avions()
   {
      // Coonexion à la base de donnée
      $mysqli = connect_db();
      
      $sql  = 'SELECT id_avion FROM `avions`';

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

   ////////////////////////////////////////////////////////////////////////////////////
   function get_aerodromeData()
   {
      // Coonexion à la base de donnée
      $mysqli = connect_db();
      
      $sql  = 'SELECT * FROM `aerodrome` ORDER BY OACI';

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

   ////////////////////////////////////////////////////////////////////////////////////
   function get_avionsData()
   {
      // Coonexion à la base de donnée
      $mysqli = connect_db();
      
      $sql  = 'SELECT * FROM avions JOIN compagnie ON avions.id_compagnie = compagnie.id_compagnie';

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
   
   ////////////////////////////////////////////////////////////////////////////////////
   function dateDiff($date1, $date2)
   {
      $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
      $retour = array();
   
      $tmp = $diff;
      $retour['second'] = $tmp % 60;
   
      $tmp = floor( ($tmp - $retour['second']) /60 );
      $retour['minute'] = $tmp % 60;

      if ($retour['minute'] == 0)
      {
         $retour['minute'] = '00';
      }
   
      $tmp = floor( ($tmp - $retour['minute'])/60 );
      $retour['hour'] = $tmp % 24;

      if ($retour['heure'] == 0)
      {
         $retour['heure'] = '00';
      }
   
      $tmp = floor( ($tmp - $retour['hour'])  /24 );
      $retour['day'] = $tmp;

      return $retour;
   }

   function calcul_heures($id_utilisateur, $date_debut_intervalle, $date_fin_intervalle)
   {
      // Coonexion à la base de donnée
      $mysqli = connect_db();

      $sql  = 'SELECT route.date_debut, route.date_arr
               FROM route
               JOIN vol ON route.id_vol = vol.id_vol
               WHERE vol.id_utilisateur = '.$id_utilisateur.' AND date_debut >= "'.$date_debut_intervalle.'" AND date_arr <= "'.$date_fin_intervalle.'"
               ORDER BY date_debut';

      $reponse = mysqli_query($mysqli, $sql);

      // Mise en forme des données sous forme de sous tableaux associatifs
      $tableau = array();
      $indice_jour = 0;

      while ($donnee = mysqli_fetch_assoc($reponse))
      {
         $date_heure_depart = explode(" ", $donnee['date_debut']);
         $date_heure_arrivee = explode(" ", $donnee['date_arr']);

         $date_depart = $date_heure_depart[0];
         $date_arrivee = $date_heure_arrivee[0];

         $heure_depart = strtotime($date_heure_depart[1]);
         $heure_arrivee = strtotime($date_heure_arrivee[1]);

         $diff = dateDiff($heure_arrivee, $heure_depart);

         $tableau[$date_depart] += $diff['hour'];
      }

      $taille = count($tableau);
      $tableau_keys = array_keys($tableau);
      $tableau_formate = array();

      foreach ($tableau as $key => $value)
      {
         $ligne = array
         (
            jour=>$key, vol=>$value
         );

         array_push($tableau_formate, $ligne);
       }

      //  print_r($tableau_formate);


      // Libération de la mémoire
      mysqli_free_result($reponse);

      // Deconnexion à la base de donnée
      disconnect_db($mysqli);

      return $tableau_formate;
   }

   function supprimer_vol($id_vol)
   {
      // Coonexion à la base de donnée
      $mysqli = connect_db();

      // Suppression de la table route
      $sql  = 'DELETE FROM route WHERE id_vol = "'.$id_vol.'"';
      mysqli_query($mysqli, $sql);

      // Suppression de la table vol
      $sql  = 'DELETE FROM vol WHERE id_vol = "'.$id_vol.'"';
      mysqli_query($mysqli, $sql);

      // Deconnexion à la base de donnée
      disconnect_db($mysqli);
   }
?>