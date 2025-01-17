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
        <?php
            if (isset($_SESSION['id_utilisateur'])) // Utilisateur connecté
            {
                if ($_SESSION['actif'] == 1)
                {
                    echo'
                    <li><a href="'.CHEMIN.'/pages/tableau_bord.php">Tableau de bord</a></li>
                    <li>Mes vols
                        <ul>
                            <li><a href="'.CHEMIN.'/pages/mes_vols/ajouter_un_vol.php">Ajouter un vol</a></li>
                            <li><a href="'.CHEMIN.'/pages/mes_vols/gestion_des_vols.php">Gestion des vols</a></li>
                            <li><a href="'.CHEMIN.'/pages/mes_vols/statistiques.php">Statistiques</a></li>
                        </ul>
                    </li>';
                    
                    if($_SESSION['statut'] == 1 && $_SESSION['actif'] == 1)
                    {
                    echo'
                    <li>Administration
                            <ul>
                                <li><a href="'.CHEMIN.'/pages/administration/gestion_des_compagnies.php">Gestion des compagnies</a></li>
                                <li><a href="'.CHEMIN.'/pages/administration/gestion_des_aerodromes.php">Gestion des aérodromes</a></li>
                                <li><a href="'.CHEMIN.'/pages/administration/gestion_des_avions.php">Gestion des avions</a></li>
                            </ul>
                    </li>';
                    }

                    echo'<li><a href="'.CHEMIN.'/controller/deconnexion.php">Déconnexion</a></li>';
                }
            }

            else // Utilisateur non conecté
            {
                echo '
                    <li><a href="'.CHEMIN.'/index.php">Accueil</a></li>
                    <li><a href="'.CHEMIN.'/pages/connexion.php">Connexion</a></li>
                    <li><a href="'.CHEMIN.'/pages/inscription.php">Inscription</a></li>';
            }
        ?>
        
        <li><a href="<?php echo CHEMIN; ?>/pages/webmaster/webmaster.php">Webmaster</a></li>

    </ul>
</nav>