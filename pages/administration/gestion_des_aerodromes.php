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
	?>

	<body class="is-preload">
		<?php require_once ("../../template/menu.php");?>
		<!-- Heading -->
		<div id="heading" >
			<h1>Gestion des aérodromes</h1>
		</div>

		<!-- Main -->
		<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
					<?php
						$tab = getAllFlights();
						foreach($tab as $index => $com)
						{
							echo 	"<div> id='".$com->id"' class='col-md-6 offset-3'> 
										<i class='fas fa-times'></i> ".$com->
									</div>
						}
					?>
				</div>
			</div>
			</div>
		</section>

		<?php require_once ("../../template/footer.php");?>
	</body>
</html>