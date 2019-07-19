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
							<table class="table" data-toggle="table" data-search="true" data-pagination="true" data-page-size="10">

								<thead class="thead-dark">
									<tr>
									<th></th>
									<th data-field="id1" data-sortable="true">Date</th>
									<th data-field="id2" data-sortable="true">Aérodromes</th>
									<th data-field="id3" data-sortable="true">Durée</th>
									<th data-field="id4" data-sortable="true">Avions</th>
									<th data-field="id5" data-sortable="true">&Eacute;tapes</th>
									<th data-field="id6" data-sortable="true">Qualifications</th>
									<th data-field="id7" data-sortable="true">Remarques</th>
									</tr>
								</thead>
								<tbody>';

				$tableau = get_VolData($_SESSION['id_utilisateur']);

				
				foreach ($tableau as $ligne)
				{
					$etape[$ligne['id_vol']] .= ";". $ligne['OACI_dep'] .";". $ligne['OACI_arr'];
					$date[$ligne['id_vol']] .= ";". $ligne['date_debut'] .";". $ligne['date_arr'];
					$forme_etape[$ligne['id_vol']] = "<ul>". $forme_etape[$ligne['id_vol']] ."<li>". $ligne['OACI_dep'] ." - ". $ligne['OACI_arr'] ."</li>";
				}

				$forme_etape[$ligne['id_vol']] .= "</li>";
				
				$last_id_vol = -1;

				foreach ($tableau as $ligne)
				{
					$id_vol = $ligne['id_vol'];

					if ($id_vol != $last_id_vol)
					{
						$tableau_date = explode(";", $date[$id_vol]);

						$date_depart_abs = strtotime($tableau_date[1]);
						$date_depart = explode(" ", $ligne['date_debut']);
						$date_arrivee_abs = strtotime(end($tableau_date));
						$diff = dateDiff($date_arrivee_abs, $date_depart_abs);

						$tableau_aerodrome = explode(";", $etape[$id_vol]);

						$vue_id_vol = $id_vol;
						$vue_date_depart = $date_depart[0];
						$vue_aerodrome_depart = $tableau_aerodrome[1];
						$vue_aerodrome_arrivee = end($tableau_aerodrome);
						$vue_heure = $diff['hour'];
						$vue_minute = $diff['minute'];
						$vue_avion = $ligne['id_avion'];
						$vue_etape = $forme_etape[$ligne['id_vol']];
						$vue_qualifications = $ligne['qualif'];
						$vue_remarques = $ligne['commentaires'];
						
						echo '
						<tr id='.$vue_id_vol.'>
							<td><a class="icon fa-times-circle"></a>'.$vue_id_vol.'</td>
							<td><a href="#" class="date_depart" data-pk='.$vue_id_vol.' data-name="date_depart">'.$vue_date_depart.'</a></td>
							<td><ul><li>Dep : '.$vue_aerodrome_depart.'</li><li> Arr : '.$vue_aerodrome_arrivee.'</li></ul></td>
							<td>'.$vue_heure.'h'.$vue_minute.'</td>
							<td><a href="#" class="id_avion" data-pk='.$vue_id_vol.' data-name="id_avion">'.$vue_avion.'</a></td>
							<td>'.$vue_etape.'</td>
							<td><a href="#" class="text_area" data-pk='.$vue_id_vol.' data-name="qualif">'.$vue_qualifications.'</a></td>
							<td><a href="#" class="text_area" data-pk='.$vue_id_vol.' data-name="commentaires">'.$vue_remarques.'</a></td>
						</tr>';

						$last_id_vol = $id_vol;
					}
				}
						echo '</tbody>
							</table>
							<a href="#" id="status"">Slect</a>
					</div>
				</section>';
			}

			else // Utilisateur déjà connecté
			{
				header('Location: ../../index.php');
			}
		?>

		<?php require_once ("../../template/footer.php");?>
	</body>
</html>