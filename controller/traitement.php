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
                        // on teste la déclaration de nos variables
                        if ($_POST['login'] != "" && $_POST['mdp'] != "") {
                            // on affiche nos résultats
                            echo 'Votre login est '.$_POST['login'].' et votre mot de passe est '.$_POST['mdp'];
                        }

                        else
                        {
                            echo "Erreur";
                        }
                        ?>
                    </div>
                </div>
            </section>
		<?php require_once ("../template/footer.php");?>
	</body>
</html>