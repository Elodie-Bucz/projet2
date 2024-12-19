<h1>Créer un article</h1>
<form action="?controller=forum&function=store" method="post" id="form-form">
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" required>

    <label for="article">Article</label>
    <textarea name="article" id="article" required></textarea>

    <input type="submit" value="Créer">
</form>