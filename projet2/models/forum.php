<?php

function forum_select() {
    require_once("lib/connex.php");

    $sql = "SELECT forum.id_article, forum.titre, forum.article, forum.date_poste, utilisateur.nom
            FROM forum
            INNER JOIN utilisateur ON forum.id_utilisateur = utilisateur.id_utilisateur
            ORDER BY forum.date_poste DESC";

    $result = mysqli_query($connex, $sql);

    if (!$result) {
        return false; 
    }

    return $result;
}

?>
