<?php

function regModel($classname) {
    $path = '../code/' . $classname . '.php';
    $path = str_replace('\\', '/', $path);
    require_once($path);
}

spl_autoload_register('regModel');


//require_once("code/controllers/MainController.php");
$main = new \controllers\MainController();
$main->actionShowMainPage();