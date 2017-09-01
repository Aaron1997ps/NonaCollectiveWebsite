<?php

if (!loggedIn()) {
    insertError(MError::RESTRICTED_ACCESS);
}

$res = MDatabaseAuth::resetUser($_SESSION["username"]);

if (!$res) {
    insertError(MError::QUERY_ERROR);
    return;
}

$_SESSION['session'] = null;
$_SESSION['username'] = null;

$GLOBALS['response']['success'] = true;
array_push($GLOBALS['response']['response'], MInfo::LOGGED_OUT);