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
					<!-- Form -->
					<h3>Formulaire d'inscription</h3>
					<div class="col">
					<form method="post" action="#">
						<div class="row gtr-uniform">
							<div class="col-2 col-lg-2">
							</div>
							<div class="col-8 col-12-xsmall">
								<input type="text" name="nom" id="nom" value="" placeholder="Nom" />
							</div>
							<div class="col-2 col-lg-2">
							</div>
							<div class="col-2 col-lg-2">
							</div>
							<div class="col-8 col-12-xsmall">
								<input type="text" name="prenom" id="prenom" value="" placeholder="Prenom" />
							</div>
							<div class="col-2 col-lg-2">
							</div>
							<div class="col-2 col-lg-2">
							</div>
							<div class="col-8 col-7-xsmall">
								<input type="email" name="email" id="email" value="" placeholder="Email" />
							</div>
							<div class="col-2 col-lg-2">
							</div>
							<div class="col-2 col-lg-2">
							</div>
							<div class="col-8 col-7-xsmall">
								<input type="password" name="mdp" id="mdp" value="" placeholder="Mot de passe" />
							</div>
							<div class="col-2 col-lg-2">
							</div>
							<div class="col-2 col-lg-2">
							</div>
							<!-- Break -->
							<div class="col-8">
								<ul class="actions fit">
									<li><input id="subscribe_button" type="submit" value="Inscription" class="button primary fit" /></li>
								</ul>
							</div>
						</div>
					</form>
				</div>	
			</div>
		</section>

		<?php require_once ("../template/footer.php");?>
		<script type="text/javascript" src="../assets/js/improvement.js?<?php echo date(':i:s');?>"></script>
	</body>
</html>