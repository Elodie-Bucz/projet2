<link rel="stylesheet" href="resources/css/style.css">

<h1>Connexion</h1>
<form action="?controller=client&function=compare" method="post">
    <label for="nom_utilisateur">Nom d'Utilisateur</label>
    <input type="email" name="nom_utilisateur" id="nom_utilisateur" required>

    <label for="mot_de_passe">Mot de Passe</label>
    <input type="password" name="mot_de_passe" id="mot_de_passe" required>

    <input type="submit" value="Se connecter">
</form>
<div class="align_center">
    <a href="?controller=client&function=create" class="button">Créer un compte</a>
    <a href="?controller=forum&function=indexOffline" class="button">Continuer sans compte</a>
</div>
