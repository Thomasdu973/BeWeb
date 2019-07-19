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

	<body class="is-preload">
		<?php require_once ("../../template/menu.php");?>
		<?php
			if (isset($_SESSION['id_utilisateur']))
			{
				echo '<!-- Heading -->
				<div id="heading" >
					<h1>Ajouter un vol</h1>
				</div>
				<section id="main" class="wrapper">
					<div class="inner">
						<div class="content">';
						if (isset($_GET['ajoute']))
						{
							echo '<p>Votre vol a bien été ajouté</p>';
						}

						echo'
						<div class="col">
							<form method="post" action="../../controller/traitement_ajout_vol.php">
								<div class="row gtr-uniform">
									<div class="col-8 col-7-xsmall">
										<select name="id_avion" id="category" required>
											<option value="">- Avion -</option>';
											$tableau = get_avionsData();
											
											foreach ($tableau as $ligne)
											{
												echo'
												<option value='.$ligne['id_avion'].'>'.$ligne['id_avion'].' -- '.$ligne['type_avion'].'</option>';
											}
									echo'
										</select>
									</div>

									<div class="col-8 col-7-xsmall">
										<select name="OACI_dep" id="category" required>
											<option value="">- Aérodrome de départ -</option>';
											$tableau = get_aerodromeData();
											
											foreach ($tableau as $ligne)
											{
												echo'
												<option value='.$ligne['OACI'].'>'.$ligne['OACI'].' -- '.$ligne['nom_ad'].'</option>';
											}
									echo'
										</select>
									</div>

									<div class="col-8 col-12-xsmall">
										<input type="text" name="date_debut" id="prenom" value="" placeholder="Heure de départ" required/>
									</div>

									<div class="col-8 col-7-xsmall">
										<select name="OACI_arr" id="category" required>
											<option value="">- Aérodrome d\'arrivée -</option>';
											$tableau = get_aerodromeData();
											
											foreach ($tableau as $ligne)
											{
												echo'
												<option value='.$ligne['OACI'].'>'.$ligne['OACI'].' -- '.$ligne['nom_ad'].'</option>';
											}
									echo'
										</select>
									</div>

									<div class="col-8 col-12-xsmall">
										<input type="text" name="date_arr" id="prenom" value="" placeholder="Heure d\'arrivée" required/>
									</div>

									<div class="col-8 col-7-xsmall">
										<select name="OACI_int" id="category">
											<option value="">- Aérodrome intermédiaire -</option>';
											$tableau = get_aerodromeData();
											
											foreach ($tableau as $ligne)
											{
												echo'
												<option value='.$ligne['OACI'].'>'.$ligne['OACI'].' -- '.$ligne['nom_ad'].'</option>';
											}
									echo'
										</select>
									</div>

									<div class="col-8 col-12-xsmall">
										<input type="text" name="qualif" id="prenom" value="" placeholder="Qualification"/>
									</div>

									<div class="col-8 col-12-xsmall">
										<input type="text" name="commentaires" id="prenom" value="" placeholder="Commentaires" required/>
									</div>

									<!-- Break -->
									<div class="col-8">
										<ul class="actions fit">
											<li><input id="add_flight_button" type="submit" value="Ajouter un vol" class="button primary fit" /></li>
										</ul>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>';
			}

			else // Utilisateur non connecté
			{
				header('Location: ../../index.php');
			}
		?>

		<?php require_once ("../../template/footer.php");?>
	</body>
</html>