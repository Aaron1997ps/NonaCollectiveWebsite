<?php

if (!loggedIn()) {
    insertError(MError::RESTRICTED_ACCESS);
    return;
}
if (empty($_POST["id"])) {
    insertError(MError::ARGUMENT_ERROR);
    return;
}

$id = $_POST["id"];

$article = MDatabaseArticle::getDescription($id);

if (!$article) {
    insertError(MError::QUERY_ERROR);
    return;
}

$GLOBALS['response']['success'] = true;
array_push($GLOBALS['response']['response'], $article);
