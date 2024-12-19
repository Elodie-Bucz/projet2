<?php

function forum_controller_create(){
    return render("article/create.php");
}

function forum_controller_show(){
    return render("article/article.php");
}

require_once(MODEL_DIR . "/forum.php");

function forum_controller_index() {
    $data = forum_select();

    if ($data === false) {
        die('Failed to fetch articles from database');
    }

    // var_dump($data);

    return render("client/index.php", ['articles' => $data]);
}

function forum_controller_indexOffline() {
    $data = forum_select();

    if ($data === false) {
        die('Failed to fetch articles from database');
    }

    return renderOffline("client/index.php", ['articles' => $data]);
}

function forum_controller_store(){
    return render("article/construction.php");
}


?>
