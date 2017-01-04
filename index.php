<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function autoload ($class) {
    include_once('src/' . str_replace('\\', '/', $class) . '.php');
}
spl_autoload_register('autoload');


$teste = new \App\Model\User(array(
    'name'=>'Teste',
    'password'=>'123456'
    ));

var_dump($teste->__get('password'));