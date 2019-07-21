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
	require_once ("../../data/config.php");
	require_once ("../../template/header.php");
	include '../../controller/utils.php';
	?>
	
	<link rel="stylesheet" href="../../assets/library/chart_gpl/codebase/chart.css">
	<link rel="stylesheet" href="../../assets/css/stat.css">

	<body class="is-preload">
		<?php require_once ("../../template/menu.php");
			if (isset($_SESSION['id_utilisateur']))
			{
				echo '<!-- Heading -->
				<div id="heading" >
					<h1>Statistiques</h1>
				</div>

				<!-- Main -->
				<section id="main" class="wrapper">
					<div class="inner">
						<div class="content">
						<div class="col">

							<form id="stat">
								<div class="row gtr-uniform">
								<div class="col-3 col-12-xsmall">
										<p>Début de l\'intervalle</p>
									</div>

									<div class="col-3 col-12-xsmall">
										<p>Fin de l\'intervalle</p>
									</div>

									<div class="col-6 col-12-xsmall"></div>

									<div class="col-3 col-12-xsmall">
										<input type="date" name="date_debut_intervalle" value="Début de l\'intervalle" required/>
									</div>

									<div class="col-3 col-12-xsmall">
										<input type="date" name="date_fin_intervalle" value="Fin de l\'intervalle" required/>
									</div>
									<!-- Break -->
									<div class="col-6">
										<ul class="actions fit">
											<li><input type="submit" value="Mettre à jour l\'affichage" class="button primary fit" /></li>
										</ul>
									</div>
								</div>
							</form>

							<div id="chart1"></div>
							
						</div>
					</div>
				</section>';
			}

			else // Utilisateur non connecté
			{
				header('Location: ../../index.php');
			}

			require_once ("../../template/footer.php");
		?>
		<script src="../../assets/library/chart_gpl/codebase/chart.js"></script>
		<script src="../../assets/js/stat.js"></script>
	</body>
</html>