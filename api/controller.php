<?php

$GLOBALS['response'] = [
    'success' => false,
    'response' => [],
    'errors' => []
];

if (file_exists($_GET["path"] . '.php')) {
    include($_GET["path"] . '.php');
} else {
    insertError(MError::UNKNOWN_TASK);
}

die(json_encode($GLOBALS['response']));

function loggedIn() {
    return MBase::getUser() == true;
}

function insertError($msg) {
    $GLOBALS['response']['success'] = false;
    array_push($GLOBALS['response']['errors'], $msg);
}
