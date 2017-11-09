<?php



$forbiddenFolder = ["tools", "lang", "classes", "templates"];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

foreach ($forbiddenFolder as $item) {
    $pos = strpos($_GET["path"], $item);
    if ($pos . "" == "0") {
        die("403 Forbidden!");
    }
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//load base
include_once (realpath("./") . "/classes/MInfo.php");
include_once (realpath("./") . "/classes/MError.php");
include_once (realpath("./") . "/MBase.php");
include_once (realpath("./") . "/classes/MDatabase.php");

if (strpos($_GET['path'], 'api/') !== false && strpos($_GET['path'], 'api/') == 0) {
    include(realpath("./") . '/api/controller.php');
    return;
}

MBase::initialize();

include("index.php");