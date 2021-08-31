<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</span></a>
        </li>
        <li><a class='nav-link' href='<?= hlien("authentification", "deconnexion") ?>'>Se déconnecter</a></li
        <?php
        if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "admin") { ?>
          <li><a class='nav-link' href='<?= hlien("accessoire", "index") ?>'>Accessoire</a></li>
          <li><a class='nav-link' href='<?= hlien("affaire", "index") ?>'>Affaire</a></li>
          <li><a class='nav-link' href='<?= hlien("agence", "index") ?>'>Agence</a></li>
          <li><a class='nav-link' href='<?= hlien("allouer", "index") ?>'>Allouer</a></li>
          <li><a class='nav-link' href='<?= hlien("categorie", "index") ?>'>Categorie</a></li>
          <li><a class='nav-link' href='<?= hlien("contenir", "index") ?>'>Contenir</a></li>
          <li><a class='nav-link' href='<?= hlien("departement", "index") ?>'>Departement</a></li>
          <li><a class='nav-link' href='<?= hlien("location", "index") ?>'>Location</a></li>
          <li><a class='nav-link' href='<?= hlien("tranche", "index") ?>'>Tranche</a></li>
          <li><a class='nav-link' href='<?= hlien("utilisateur", "index") ?>'>Utilisateur</a></li>
          <li><a class='nav-link' href='<?= hlien("voiture", "index") ?>'>Voiture</a></li>
          <li><a class='nav-link' href='<?= hlien("authentification", "deconnexion") ?>'>Se déconnecter</a></li>
          <li><a class='nav-link' href='<?= hlien("default", "contact") ?>'>nous contacter</a></li>
          <li><a class='nav-link' href='<?= hlien("utilisateur", "privee") ?>'>privee</a></li>

        <?php } else if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "agent") { ?>

        <?php } else if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "SRC") { ?>

        <?php } else if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "client") { ?>

        <?php } else { ?>

        <?php } ?>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION["id"])) { ?>
          <li><a class="nav-link" href="<?= hlien("authentification", "deconnexion") ?>">Déconnexion</a></li>
          <li><a class="nav-link" href="<?= hlien("utilisateur", "privet") ?>"><?=$_SESSION["nom"]?></a></li>
        <?php } else { ?>
          <li><a class="nav-link" href='<?= hlien("authentification", "inscription") ?>'>Inscription</a></li>
          <li><a class="nav-link" href='<?= hlien("authentification", "connexion") ?>'>Connexion</a></li>
          <li><a class='nav-link' href='<?= hlien("_default", "contact") ?>'>nous contacter</a></li>
          <li><a class='nav-link' href='<?= hlien("utilisateur", "index") ?>'>Utilisateur</a></li>

        <?php } ?>
      </ul>
    </div>
  </div>
</nav>