<h1>Créer un compte</h1>
<form action="?controller=client&function=store" method="post" id="client-form">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" required value="<?= htmlspecialchars($request['nom'] ?? '') ?>">

    <label for="nom_utilisateur">Nom d'Utilisateur</label>
    <input type="email" name="nom_utilisateur" id="nom_utilisateur" required value="<?= htmlspecialchars($request['nom_utilisateur'] ?? '') ?>">

    <label for="mot_de_passe">Mot de Passe</label>
    <input type="text" name="mot_de_passe" id="mot_de_passe" required>

    <label for="date_de_naissance">Date de Naissance</label>
    <input type="date" name="date_de_naissance" id="date_de_naissance" value="<?= htmlspecialchars($request['date_de_naissance'] ?? '') ?>">

    <input type="submit" value="Créer">
</form>


