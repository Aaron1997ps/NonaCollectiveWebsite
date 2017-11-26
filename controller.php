<?php



$whitelist = ["assets"];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



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


if($_GET['path'] == "login") {
    include("login.php");
} else if ($_GET['path'] != "") {
    foreach ($whitelist as $item) {
        $pos = strpos($_GET["path"], $item);
        if ($pos . "" == "0") {
            die($_GET['path']);
        }
    }
    die("505");
} else {
    include("index.php");
}
