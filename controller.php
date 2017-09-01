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

if (strpos($_GET['path'], 'ea/') === 0) {
    setcookie("openEAOnStartup", explode("/", $_GET['path'])[1], time() + 3600, "/");
    header("Location: /");
    return;
}

if (strpos($_GET['path'], 'case/') === 0) {
    setcookie("openCaseOnStartup", explode("/", $_GET['path'])[1], time() + 3600, "/");
    header("Location: /");
    return;
}

if (isset($_COOKIE['openEAOnStartup'])) {
    define("openEAOnStartup", $_COOKIE['openEAOnStartup']);
    setcookie("openEAOnStartup", "", time() - 3600, "/");
} else {
    define("openEAOnStartup", "");
}

if (isset($_COOKIE['openCaseOnStartup'])) {
    define("openCaseOnStartup", $_COOKIE['openCaseOnStartup']);
    setcookie("openCaseOnStartup", "", time() - 3600, "/");
} else {
    define("openCaseOnStartup", "");
}

//load base
include_once (realpath("./") . "/classes/MInfo.php");
include_once (realpath("./") . "/classes/MError.php");
include_once (realpath("./") . "/MBase.php");
include_once (realpath("./") . "/classes/MDatabase.php");

MBase::initPaths();
if (strpos($_GET['path'], 'api/') !== false && strpos($_GET['path'], 'api/') == 0) {
    include(MBase::getBase() . 'api/controller.php');
    return;
}

MBase::initialize();

if (MBase::getUser() == MInfo::SHOWPIN) {
    include_once(MBase::getBase() . 'pin.php');
    return;
}

if (MBase::getUser() == null) {
    echo(MError::RESTRICTED_ACCESS);
    return;
}

//TODO validate request authentication
if (file_exists($_GET["path"])) {
    if (is_dir($_GET["path"])) {
        if (!file_exists($_GET["path"] . '/index.php')) {
            include(MBase::getBase() . "404.html");
        }

        include($_GET["path"] . '/index.php');
        return;
    }
    include($_GET["path"]);
} else {
    if ($_GET["path"] === "") {
        include("index.php");
    } else {
        include(MBase::getBase() . "404.html");
    }
}
