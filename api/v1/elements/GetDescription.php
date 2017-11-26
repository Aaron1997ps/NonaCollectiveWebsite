<?php

if (!loggedIn()) {
    insertError(MError::RESTRICTED_ACCESS);
    return;
}
if (empty($_POST["name"])) {
    insertError(MError::ARGUMENT_ERROR);
    return;
}

$name = $_POST["name"];

$description = MDatabaseElement::getDescription($name);

if (!$description) {
    insertError(MError::QUERY_ERROR);
    return;
}

$GLOBALS['response']['success'] = true;
array_push($GLOBALS['response']['response'], $description);
