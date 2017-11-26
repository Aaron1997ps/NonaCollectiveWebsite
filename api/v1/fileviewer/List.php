<?php

if (!loggedIn()) {
    insertError(MError::RESTRICTED_ACCESS);
    return;
}

if (empty($_POST["path"])) $_POST["path"] = "/";

$path = $_POST["path"];
$base = "./files";

$filesIt = scandir($base . $path);


$dirs = [];
$files = [];

foreach ($filesIt as $file) {
    if ($file == "." || $file == "..") continue;
    if (is_dir($base . $path . $file)) {
        array_push($dirs, $path . $file);
    }

    if (is_file($base . $path . $file)) {
        array_push($files, $path . $file);
    }


}
$GLOBALS['response']['success'] = true;

$GLOBALS['response']['response']['files'] = $files;
$GLOBALS['response']['response']['dirs'] = $dirs;