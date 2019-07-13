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
			<h1>Connexion</h1>
		</div>

		<!-- Main -->
		<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
					<?php
						if (!isset($_SESSION['id_utilisateur'])) // Utilisateur non connecté
						{
							echo '<h3>Entrez vos coordonnées</h3>';

							if (isset($_GET['erreur']))
							{
								echo '<p>Adresse email ou mot de passe incorrect</p>';
							}

							echo '<div class="col">
								<form method="post" action="../controller/traitement_connexion.php" id=""mainform>
									<div class="row gtr-uniform">
										<div class="col-8 col-7-xsmall">
											<input type="email" name="email" id="email" value="" placeholder="Email" required/>
										</div>
										<div class="col-8 col-7-xsmall">
											<input type="password" name="mdp" id="mdp" value="" placeholder="Mot de passe" required/>
										</div>
										<!-- Break -->
										<div class="col-8">
											<ul class="actions fit">
												<li><input id="connect_button" type="submit" value="Connexion" class="button primary fit" /></li>
											</ul>
										</div>
									</div>
								</form>';
						}

						else // Utilisateur déjà connecté
						{
							header('Location: tableau_bord.php');
						}
					?>

				</div>	
			</div>
		</section>

		<?php require_once ("../template/footer.php");?>
		<script type="text/javascript" src="../assets/js/improvement.js?<?php echo date(':i:s');?>"></script>
		<script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
	</body>
</html>

