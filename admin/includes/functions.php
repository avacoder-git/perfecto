<?php

function classAutoLoader($class){

    $class = strtolower($class);

    $path  = "includes/{$class}.php";

    if (is_file($path))
    {
        include ($path);
    }else{
        die("This file name {$class}.php was not found, man... ");
    }

}

function redirect($location)
{

    header("Location: {$location} "  );


}
spl_autoload_register('classAutoLoader');




?>