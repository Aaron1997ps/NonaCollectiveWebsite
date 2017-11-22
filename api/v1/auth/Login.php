<?php

if (loggedIn()) {
    insertError(MError::RESTRICTED_ACCESS);
    return;
}

if (empty($_POST["username"]) || empty($_POST["password"])) {
    insertError(MError::UNKNOWN_CREDENTIALS);
    return;
}

$user = $_POST["username"];
$pass = $_POST["password"];
$pass = hash_hmac("sha256", $pass, MBase::getConfig()["salt"]);

$DBUser = MDatabaseAuth::getUser($_POST["username"]);

if ($DBUser == null) {
    insertError(MError::UNKNOWN_CREDENTIALS);
    return;
}

$ses = MDatabaseAuth::loginUser($user);

if ($ses == null) {
    insertError(MError::QUERY_ERROR);
    return;
}

$_SESSION['session'] = $ses;
$_SESSION['username'] = $user;

$GLOBALS['response']['success'] = true;
array_push($GLOBALS['response']['response'], MInfo::LOGGED_IN);