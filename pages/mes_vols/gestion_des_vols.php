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
			<h1>Gestion des vols</h1>
		</div>

		<!-- Main -->
		<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
					<header>
						<h2>Tableau de vols</h2>
					</header>
					<p> <?php $data=get_volData(); 


print_r($data);	?>

						<table class="orders_details" width="100%" border="0" cellspacing="0" cellpadding="5" style="text-align:center">
									<thead>
										<tr>
											<th>Date</th>
											<th>Aérodromes</th>
											<th>Durée</th>
											<th>Avions</th>
											<th>Qualifications</th>
											<th>Remarques</th>
										</tr>
									</thead>	
									<tbody>	
											<tr>
											<td>Date <?php echo $data['date_debut']; ?> </td>
											<td>Aérodromes dep: <?php echo $data['OACI_dep']; ?> <br/>
														arr:  <?php echo $data['OACI_arr']; ?></td>
											<td>Durée <?php echo $data['date_arr']-$data['date_debut']; ?></td>
											<td>Avions <?php echo $data['id_avion']; ?></td>
											<td>Etapes <?php echo $data[]; ?>
												<ol>
													<li>
													</li>
												</ol>
											</td>
											<td>Qualifications <?php echo $data['qualif']; ?></td>
											<td>Remarques <?php echo $data['commentaires']; ?></td>
											</tr>
									</tbody>
					<p>Lorem ipsum dolor sit accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Magna et cursus lorem faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod tempus. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida lorem ipsum dolor sit amet dolor feugiat consequat. </p>
					<hr />
					<h3>Magna odio tempus commodo</h3>
					<p>In arcu accumsan arcu adipiscing accumsan orci ac. Felis id enim aliquet. Accumsan ac integer lobortis commodo ornare aliquet accumsan erat tempus amet porttitor. Ante commodo blandit adipiscing integer semper orci eget. Faucibus commodo adipiscing mi eu nullam accumsan morbi arcu ornare odio mi adipiscing nascetur lacus ac interdum morbi accumsan vis mi accumsan ac praesent.</p>
					<p>Felis sagittis eget tempus primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Magna sed etiam ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus lorem ipsum dolor sit amet nullam.</p>
				</div>
			</div>
		</section>

		<?php require_once ("../../template/footer.php");?>
	</body>
</html>