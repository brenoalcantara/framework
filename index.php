<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//spl_autoload_register(function ($class) {
//    require_once(str_replace('src\\', '/', $class . '.php'));
//});

function autoload ($class) {
    include_once('src/' . str_replace('\\', '/', $class) . '.php');
}
spl_autoload_register('autoload');


$teste = new \App\Model\Example();
var_dump($teste->__get('password'));