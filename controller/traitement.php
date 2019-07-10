<?php
    session_start();
?>
<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

	<?php
	require_once ("../data/config.php");
	require_once ("../template/header.php");
	?>

	<body class="is-preload">
		<?php require_once ("../template/menu.php");?>
		<!-- Heading -->
		<div id="heading" >
			<h1>Ajouter un vol</h1>
		</div>

            <!-- Main -->
            <section id="main" class="wrapper">
                <div class="inner">
                    <div class="content">
                    <?php
                        include '../controller/utils.php';
                        if (empty ($_POST['email']))
                        {
                            echo "<p>Le champ email est vide</p>";
                        }

                        else
                        {
                            if (empty ($_POST['mdp']))
                            {
                                echo "<p>Le champ mot de passe est vide</p>";
                            }

                            else
                            {
                                // Protection contre les injections SQL
                                $email = htmlentities($_POST['email'], ENT_QUOTES, "ISO-8859-1");
                                $mdp = htmlentities($_POST['mdp'], ENT_QUOTES, "ISO-8859-1");

                                // Coonexion à la base de donnée
                                $mysqli = connect_db();

                                // Requête à la base de donnée
                                $requete = mysqli_query($mysqli,"SELECT * FROM utilisateur WHERE email = '".$email."' AND mot_passe = '".$mdp."'");
                                
                                // si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                                // si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                                if(mysqli_num_rows($requete) == 0) 
                                {
                                    echo "<p>Adresse email ou mot de passe incorrect, le compte n'a pas été trouvé.<p/>";
                                } 
                                
                                else 
                                {
                                    // on ouvre la session avec $_SESSION:
                                    $_SESSION['email'] = $email; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le email
                                    header('Location: ../pages/tableau_bord.php');
                                }
                            }
                        }
                        // Fermeture de la base de donnée
                        disconnect_db($db);
                        ?>
                    </div>
                </div>
            </section>
		<?php require_once ("../template/footer.php");?>
	</body>
</html>