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
							<div id="chart1"></div>					
						</div>
						<p id="test">Hello</p>
					</div>';

						$tab = calcul_heures($_SESSION['id_utilisateur'], '2019-01-01', '2020-01-01');
						// print_r($tab);
				echo '</section>';
			}

			else
			{
				header('Location : ../../index.php');
			}

			require_once ("../../template/footer.php");
		?>
		<script src="../../assets/library/chart_gpl/codebase/chart.js"></script>
		<script src="../../assets/js/stat.js"></script>
	</body>
</html>