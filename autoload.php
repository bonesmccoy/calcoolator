<?php
define("SRC_DIR", __DIR__ . "/src/");

include "vendor/autoload.php";

class Autoloader {
    static public function loader($className) {
        $filename = SRC_DIR . str_replace('\\', '/', $className) . ".php";
        if (file_exists($filename)) {
            include  $filename ;
            if (class_exists($className)) {
                return TRUE;
            }
        }
        return FALSE;
    }
}
spl_autoload_register('Autoloader::loader');
