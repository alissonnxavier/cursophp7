<?php

spl_autoload_register(function($className){

    $class = "class" . DIRECTORY_SEPARATOR . $className . ".php";

    if(file_exists($class)){
        require_once("$class");
    }
})











?>