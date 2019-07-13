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
			<h1>Ajouter un vol</h1>
		</div>
		<form method="post" action="">

			<p>
				<label for="avions">Avions utilisé</label><br />
				<?php
					$req="SELECT type_avion FROM avions";
					$res=mysql_query($req) or die("erreur dans la requête $req");
					<select size='1' name='avion' id='avion'>;
					while ($avion=mysql_fetch_array($res))
					{ 
						for ($i=0;$i<count($avion);$i++)
						<option value='$avion[$i]'>$avion[$i]</option>;
					}
					echo </select>;
	
				?>	
			
			</p>
			<p>
				<label for="aerodrome">Aérodrome départ</label><br />
				<?php
					$req="SELECT OACI FROM aerodrome";
					$res=mysql_query($req) or die("erreur dans la requête $req");
					<select size='1' name='aerodrome' id='aerodrome'>;
					while ($aerodrome=mysql_fetch_array($res))
					{ 
						for ($i=0;$i<count($aerodrome);$i++)
						<option value='$aerodrome[$i]'>$aerodrome[$i]</option>;
					}
					echo </select>;
	
				?>	
			</p>
   			<p><input type="date" name="date de départ"/></p>

			<p>
			<?php
					<label for="aerodrome">Aérodrome arrivé</label><br />
					$req="SELECT OACI FROM aerodrome";
					$res=mysql_query($req) or die("erreur dans la requête $req");
					<select size='1' name='aerodrome' id='aerodrome'>;
					while ($aerodrome=mysql_fetch_array($res))
					{ 
						for ($i=0;$i<count($aerodrome);$i++)
						<option value='$aerodrome[$i]'>$aerodrome[$i]</option>;
					}
					echo </select>;
	
			?>
		
			</p>
			<p><input type="date" name="date de arrivé" /></p>
			<p>
			<?php 
					<label for="aerodrome">Aérodrome intermédiaire</label><br />

					$req="SELECT OACI FROM aerodrome";
					$res=mysql_query($req) or die("erreur dans la requête $req");
					<select size='1' name='aerodrome' id='aerodrome'>;
					while ($aerodrome=mysql_fetch_array($res))
					{ 
						for ($i=0;$i<count($aerodrome);$i++)
						<option value='$aerodrome[$i]'>$aerodrome[$i]</option>;
					}
					echo </select>;
					
	
			?>
			<input type="date" name="date de départ"/>
			<input type="date" name="date d'arrivée"/>
			</p>
			<input type="text" name="Qualification" id="pseudo" />
			<input type="text" name="Commentaires" />
	
		</form>
		<!-- Main -->
		<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
					<header>
						<h2>Feugiat consequat</h2>
					</header>
					<p>Lorem ipsum dolor sit accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Magna et cursus lorem faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod tempus. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida lorem ipsum dolor sit amet dolor feugiat consequat. </p>
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