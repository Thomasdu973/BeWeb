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
	if ($id!=0) erreur(ERR_IS_CO);
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
					<!-- Form -->
					<h3>Entrez vos coordonnées</h3>
					<?php
						if (isset($_GET['ident']))
						{
							echo '<p>Veuillez vous identifier</p>';
						}

						else if (isset($_GET['email']))
						{
							echo '<p>Le champ email est vide</p>';
						}

						else if (isset($_GET['mdp']))
						{
							echo '<p>Le champ mot de passe est vide</p>';
						}
						else if (isset($_GET['erreur']))
						{
							echo '<p>Email ou mot de passe incorrect</p>';
						}
					?>
					<div class="col">
					<?php
						if (!isset($_POST['email']))
						{
							echo '
							<form method="post" action="../controller/traitement_connexion.php" id=""mainform>
								<div class="row gtr-uniform">
									<div class="col-8 col-7-xsmall">
										<input type="text" name="email" id="email" value="" placeholder="Email" />
									</div>
									<div class="col-8 col-7-xsmall">
										<input type="password" name="mdp" id="mdp" value="" placeholder="Mot de passe" />
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

						else
						{
							echo '<p>Vous êtes déjà connecté</p>';
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

