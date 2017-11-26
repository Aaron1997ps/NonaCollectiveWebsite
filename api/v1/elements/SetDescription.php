<?php

if (!loggedIn()) {
    insertError(MError::RESTRICTED_ACCESS);
    return;
}
if (empty($_POST["name"]) || empty($_POST["description"])) {
    insertError(MError::ARGUMENT_ERROR);
    return;
}

$name = $_POST["name"];
$description = $_POST["description"];

if (!MDatabaseElement::setDescription($name, $description)) {
    insertError(MError::QUERY_ERROR);
    return;
}

$GLOBALS['response']['success'] = true;
array_push($GLOBALS['response']['response'], MInfo::OK);
