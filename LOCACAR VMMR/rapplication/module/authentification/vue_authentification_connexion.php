<?= $message ?>
<h1>Authentification</h1>
<form method="post">
    <p><label for="uti_login">Login : </label><input type="text" name="uti_login" id="uti_login" value="<?=$uti_login?>" required></p>
    <p><label for="uti_mdp">Mot de passe : </label><input type="password" name="uti_mdp" id="uti_mdp" required></p>
    <p><input type="submit" name="btSubmit" value="Se connecter"></p>
</form>