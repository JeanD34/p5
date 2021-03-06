<?php

setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');

require_once 'Config/Config.php';

session_start();

spl_autoload_register('autoload');

function autoload($class, $dir = null) {
    
    if (is_null($dir)) {
        $dir = "../". AUTOLOAD_PATH ."/";
    }
    
    foreach (scandir($dir) as $file) {
            
        // directory
        if (is_dir($dir.$file) && substr($file, 0, 1) !== '.') {
            autoload($class, $dir.$file.'/');
        }
        // php file
        if (preg_match("/.php$/i" , $file)) {
            
            // filename matches class
            if (str_replace('.php', '', $file) == $class) {
                
                include_once $dir . $file;
            }
        }
    }
}

$router = new Router();
$router->queryRouting();