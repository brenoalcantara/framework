<?php
spl_autoload_register(function ($class) {
    require_once(str_replace('\\', '/', $class . '.class.php'));
});


$teste = new Model\Example();

echo $teste->__get('password');
