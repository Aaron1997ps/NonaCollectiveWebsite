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

// Load Composer
require 'vendor/autoload.php';

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

//TODO validate request authentication
$get = "/" . $_GET["path"];
$r = new Router($get);

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

if ($r->route("/test")) {

    $template = $twig->load('test.html.twig');

    $data = array('navigation' => [
        array('href' => "test", 'caption' => "tes123t"),
        array('href' => "test2", 'caption' => "test2"),
        array('href' => "test2", 'caption' => "test23"),
    ]);

    die($template->render($data));
}

if ($r->route("/")) {

    $template = $twig->load('index.html.twig');

    $data = array('navigation' => [
    array('href' => "test", 'caption' => "test"),
    array('href' => "test2", 'caption' => "test2"),
    ]);

    die($template->render($data));
}

class Router {
    private $r = null;
    function __construct($r) {
        $this->r = $r;
    }

    function route($route) {
        return 0 === strpos($this->r, $route);
    }
}