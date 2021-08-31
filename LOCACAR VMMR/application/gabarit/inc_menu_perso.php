<ul>

    <?php if (isset($_SESSION["profil"])) {
        if ($_SESSION["profil"] == "admin") { ?>
            <li><a href="<?=hlien("utilisateur","index","type","agent")?>">AGENTS</a></li>
            <li><a href="<?=hlien("utilisateur","index","type","SRC")?>">SRC</a></li>
            <li><a href="<?=hlien("utilisateur","index","type","client")?>">CLIENTS</a></li>
            <li><a href="<?=hlien("allouer","index")?>">TARIFS</a></li>
            <li><a href="<?=hlien("categorie","index")?>">CATEGORIES</a></li>
            <li><a href="<?=hlien("tranche","index")?>">TRANCHES HORAIRES</a></li>
            <li><a href="<?=hlien("agence","index")?>">AGENCES</a></li>
            <li><a href="<?=hlien("voiture","index")?>">VOITURES</a></li>
            <li><a href="<?=hlien("utilisateur","statestique")?>">STATESTIQUE</a></li>
        <?php } else if ($_SESSION["profil"] == "SRC") { ?>
            <li><a href="<?=hlien("_default","index")?>">test SRC</a></li>
        <?php } else if ($_SESSION["profil"] == "agent") { ?>
            <li><a href="<?=hlien("_default","index")?>">test agent</a></li>
        <?php } else if ($_SESSION["profil"] == "client") { ?>
            <li><a href="<?=hlien("_default","index")?>">test client</a></li>
    <?php }
    } ?>

</ul>