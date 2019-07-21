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
		<?php
			if (isset($_SESSION['id_utilisateur'])) // Si l'utilisateur est connecté
			{
				echo'
				<!-- Heading -->
				<div id="heading" >
					<h1>Tableau de bord</h1>
				</div>

				<!-- Main -->
				<section id="main" class="wrapper">
					<div class="inner">
						<div class="content">
							<header>
								<h2>Bonjour '.$_SESSION['prenom'].' !</h2>
							</header>

							<header>
								<h2><a href="mes_vols/ajouter_un_vol.php" class="icon fa-plane"><span class="label">Icon</span></a></h2>
								<h3>Ajouter un vol</h3>
							</header>

							<header>
								<h2><a href="mes_vols/gestion_des_vols.php" class="icon fa-vcard-o"><span class="label">Icon</span></a></h2>
								<h3>Gestion des vols</h3>
							</header>

							<header>
								<h2><a href="mes_vols/statistiques.php" class="icon fa-line-chart"><span class="label">Icon</span></a></h2>
								<h3>Statistiques</h3>
							</header>							
						</div>
					</div>
				</section>';
			}

			else
			{
				header('Location: ../index.php');
			}
		?>

		<?php require_once ("../template/footer.php");?>
	</body>
</html>