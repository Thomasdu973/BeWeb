<!-- Header -->
<header id="header">
    <a class="logo" href="<?php echo CHEMIN; ?>/index.php">Plan de vol</a>
    <nav>
        <a href="#menu">Menu</a>
    </nav>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li><a href="<?php echo CHEMIN; ?>/index.php">Accueil</a></li>

        <li>Mes vols
            <ul>
                <li><a href="<?php echo CHEMIN; ?>/pages/mes_vols/ajouter_un_vol.php">Ajouter un vol</a></li>
                <li><a href="<?php echo CHEMIN; ?>/pages/mes_vols/gestion_des_vols.php">Gestion des vols</a></li>
            </ul>
        </li>

        <li>Administration
            <ul>
                <li><a href="<?php echo CHEMIN; ?>/pages/administration/statistiques.php">Statistiques</a></li>
                <li><a href="<?php echo CHEMIN; ?>/pages/administration/gestion_des_compagnies.php">Gestion des compagnies</a></li>
                <li><a href="<?php echo CHEMIN; ?>/pages/administration/gestion_des_aerodromes.php">Gestion des aérodromes</a></li>
                <li><a href="<?php echo CHEMIN; ?>/pages/administration/gestion_des_avions.php">Gestion des avions</a></li>
            </ul>
        </li>

        <li><a href="<?php echo CHEMIN; ?>/pages/se_connecter/se_connecter.php">Se connecter</a>
            <ul>
                <li><a href="<?php echo CHEMIN; ?>/pages/se_connecter/inscription.php">S'inscrire</a></li>
            </ul>
        </li>

        <li><a href="<?php echo CHEMIN; ?>/pages/webmaster/webmaster.php">Webmaster</a></li>

    </ul>
</nav>