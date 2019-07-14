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
	require_once ("data/config.php");
	require_once ("template/header.php");
	?>

	<body class="is-preload">
	
		<?php require_once ("template/menu.php");?>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>Plan de vol</h1>
					<p>
						La gestion simplifiée et numérique du carnet de vol.
					</p>
				</div>
				<video autoplay loop muted playsinline src="images/banner.mp4"></video>
			</section>

		<!-- Highlights -->
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Bonjour</h2>
						<p>In arcu accumsan arcu adipiscing accumsan orci ac. Felis id enim aliquet. Accumsan ac integer lobortis commodo ornare aliquet accumsan erat tempus amet porttitor.</p>
					</header>
					<?php
						echo'<p>Id_utilisateur : '.$_SESSION['id_utilisateur'].'</p>
						<p>Nom : '.$_SESSION['nom'].'</p>
						<p>Prenom : '.$_SESSION['prenom'].'</p>
						<p>Email : '.$_SESSION['email'].'</p>
						<p>Statut : '.$_SESSION['statut'].'</p>
						<p>Actif : '.$_SESSION['actif'].'</p>';
					?>
					<div class="highlights">
						<section>
							<div class="content">
								<header>
									<a class="icon fa-vcard-o"><span class="label">Icon</span></a>
									<h3>Informations sécurisées</h3>
								</header>
								<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a class="icon fa-plane"><span class="label">Icon</span></a>
									<h3>Saisie simplifiée</h3>
								</header>
								<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a class="icon fa-cogs"><span class="label">Icon</span></a>
									<h3>Modifications rapides</h3>
								</header>
								<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a class="icon fa-line-chart"><span class="label">Icon</span></a>
									<h3>Statistiques personnalisées</h3>
								</header>
								<p>&copy; Plan de vol vous permet d'obtenir des statistiques précises sur les heures de vol éffectuées.</p>
							</div>
						</section>
					</div>
				</div>
			</section>

		<!-- CTA -->
			<section id="cta" class="wrapper">
			<div class="content">
					<!-- Form -->
					<h3>Formulaire d'inscription</h3>
					<div class="col">
					<form method="post" action="controller/traitement_inscription.php">
						<div class="row gtr-uniform">
							<div class="col-2 col-lg-2"></div>
							<div class="col-8 col-12-xsmall">
								<input type="text" name="nom" id="nom" value="" placeholder="Nom" required/>
							</div>

							<div class="col-2 col-lg-2"></div>
							<div class="col-2 col-lg-2"></div>

							<div class="col-8 col-12-xsmall">
								<input type="text" name="prenom" id="prenom" value="" placeholder="Prenom" required/>
							</div>

							<div class="col-2 col-lg-2"></div>
							<div class="col-2 col-lg-2"></div>

							<div class="col-8 col-7-xsmall">
								<input type="email" name="email" id="email" value="" placeholder="Email" required/>
							</div>

							<div class="col-2 col-lg-2"></div>
							<div class="col-2 col-lg-2"></div>

							<div class="col-8 col-7-xsmall">
								<select name="statut" id="category" required>
									<option value="">- Statut -</option>
									<option value="1">Administrateur</option>
									<option value="0">Pilote</option>
								</select>
							</div>

							<div class="col-2 col-lg-2"></div>
							<div class="col-2 col-lg-2"></div>

							<!-- Break -->
							<div class="col-8">
								<ul class="actions fit">
									<li><input id="subscribe_button" type="submit" value="Inscription" class="button primary fit" /></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
			</section>

		<!-- Témoignages -->
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Témoignages</h2>
						<p>Depuis 10 ans, Plan de Vol vient</p>
					</header>
					<div class="testimonials">
						<section>
							<div class="content">
								<blockquote>
									<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic01.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Jane Doe</strong> <span>CEO - ABC Inc.</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic03.jpg" alt="" />
									</div>
									<p class="credit">- <strong>John Doe</strong> <span>CEO - ABC Inc.</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic02.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Janet Smith</strong> <span>Pilote chez Emirates</span></p>
								</div>
							</div>
						</section>
					</div>
				</div>
			</section>

		<?php require_once ("template/footer.php");?>
	</body>
</html>