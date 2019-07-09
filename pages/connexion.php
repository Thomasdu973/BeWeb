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
					<!-- Form -->
					<h3>Entrez vos coordonnées</h3>
					<div class="col">
					<form method="post" action="#">
						<div class="row gtr-uniform">
							<div class="col-8 col-7-xsmall">
								<input type="text" name="login" id="login" value="" placeholder="Login" />
							</div>
							<div class="col-8 col-7-xsmall">
								<input type="password" name="mdp" id="mdp" value="" placeholder="Mot de passe" />
							</div>
							<!-- Break -->
							<div class="col-8">
								<ul class="actions fit">
									<li><input type="submit" value="Connexion" class="button primary fit" /></li>
								</ul>
							</div>
						</div>
					</form>
				</div>	
			</div>
		</section>

		<?php require_once ("../template/footer.php");?>
	</body>
</html>