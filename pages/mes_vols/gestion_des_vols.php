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
					<h1>Gestion des vols</h1>
				</div>

				<!-- Main -->
				<section id="main" class="wrapper">
					<div class="inner">
						<div class="content">
							<header>
								<h2>Tableau de vols</h2>
							</header>
							<table class="table" data-toggle="table" data-search="true" data-pagination="true" data-pagination-size="10">

								<thead class="thead-dark">
									<tr>
									<th></th>
									<th data-field="id1" data-sortable="true" scope="col">Date</th>
									<th data-field="id2" data-sortable="true" scope="col">Aérodromes</th>
									<th data-field="id3" data-sortable="true" scope="col">Durée</th>
									<th data-field="id4" data-sortable="true" scope="col">Avions</th>
									<th data-field="id5" data-sortable="true" scope="col">Etapes</th>
									<th data-field="id6" data-sortable="true" scope="col">Qualifications</th>
									<th data-field="id7" data-sortable="true" scope="col">Remarques</th>
									</tr>
								</thead>
								<tbody>';
				$tableau = get_VolData($_SESSION['id_utilisateur']);
// <span> class="modif" data-type="text" data-name="update_nom" data-url="" data-pk="1"</span>
				foreach ($tableau as $ligne)
				{
					echo '
					<tr>
					<td>X</td>
					<td><a href="#" id="dob" data-format="dd.mm.yyyy">15.05.1984</a></td>
					<td>aérodromes</td>
					<td>durée</td>
					<td>'.$ligne['id_avion'].'</td>
					<td>etapes</td>
					<td>'.$ligne['qualif'].'</td>
					<td>'.$ligne['commentaires'].'</td>
					</tr>';
				}
						echo '</tbody>
							</table>	
							<a href="#" id="date" data-type="text" data-pk="1">awesome</a>
					</div>
				</section>';
			}
			?>

		<?php require_once ("../../template/footer.php");?>
	</body>
</html>