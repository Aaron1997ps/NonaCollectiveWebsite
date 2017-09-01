<?php

if (!loggedIn()) {
    insertError(MError::RESTRICTED_ACCESS);
}

$db = MDatabase::init();
$res = $db->executeQuery("UPDATE `__user` SET `session` = '', `sessionExpires` = '0', `socketToken` = '', `socketTokenExpires` = '0'  WHERE `uuid` = '" . $db->quote($_SESSION['uuid']) . "';");
$db->close();

if (!$res) {
    insertError(MError::QUERY_ERROR);
    return;
}

$_SESSION['session'] = null;
$_SESSION['uuid'] = null;

$GLOBALS['response']['success'] = true;
array_push($GLOBALS['response']['response'], MInfo::LOGGED_OUT);