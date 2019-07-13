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
			<h1>Inscription</h1>
		</div>

		<!-- Main -->
		<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
					<?php
						if (isset($_SESSION['id_utilisateur'])) // Utilisateur connecté
						{
							if (isset($_SESSION['actif']) && ($_SESSION['actif'] == 2)) // Nécesité de mettre à jour son mot de passe
							{
								echo '<h3>Mise à jour du mot de passe</h3>';
								
								if (isset($_GET['erreur']))
								{
									echo '<p>Les deux entrées sont différentes</p>';
								}
								
								if (isset($_GET['idem']))
								{
									echo '<p>Veuillez entrer un mot de passe différent de votre ancien mot de passe</p>';
								}
								echo '
								<div class="col">
								<form method="post" action="../controller/traitement_mise_a_jour_mdp.php">
									<div class="row gtr-uniform">

										<div class="col-8 col-7-xsmall">
											<input type="password" name="former_mdp" id="mdp" value="" placeholder="Ancien mot de passe" required/>
										</div>

										<div class="col-8 col-7-xsmall">
											<input type="password" name="new_mdp" id="mdp" value="" placeholder="Nouveau mot de passe" required/>
										</div>

										<div class="col-8 col-7-xsmall">
											<input type="password" name="new_mdp_check" id="mdp" value="" placeholder="Confirmation du nouveau mot de passe" required/>
										</div>

										<!-- Break -->
										<div class="col-8">
											<ul class="actions fit">
												<li><input type="submit" value="Confirmation" class="button primary fit" /></li>
											</ul>
										</div>
									</div>
								</form>';
							}

							else // N'a rien à faire sur cette page
							{
								header('Location: tableau_bord.php');
							}
						}

						else // Nécessité de se connecter ou de s'inscrire
						{
							header('Location: ../index.php');
						}
					?>
				</div>	
			</div>
		</section>

		<?php require_once ("../template/footer.php");?>
		<script type="text/javascript" src="../assets/js/improvement.js?<?php echo date(':i:s');?>"></script>
	</body>
</html>