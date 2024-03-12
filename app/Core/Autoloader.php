<?php

namespace Core;
class Autoloader
{
    public function registrate(string $dir): void
    {
        $autoloader = function (string $className) use ($dir) {
            $path = str_replace('\\',  "/", $className);
            $path =  $dir .  "/" .  $path .".php";
            if (file_exists($path)) {
                require_once $path;
                return true;
            }
            return false;
        };

        spl_autoload_register($autoloader);
    }

//    public  function registrate(): void
//    {
//
//        $autoloadController = function (string $className): bool {
//            $path = "./../Controller/$className.php";
//            if (file_exists($path)) {
//                require_once $path;
//
//                return true;
//            }
//
//            return false;
//        };
//
//        $autoloadModel = function (string $className): bool {
//            $path = "./../Model/$className.php";
//            if (file_exists($path)) {
//                require_once $path;
//
//                return true;
//            }
//
//            return false;
//        };
//
//        $autoloadCore = function (string $className): bool {
//            $path = "./../Core/$className.php";
//            if (file_exists($path)) {
//                require_once $path;
//
//                return true;
//            }
//
//            return false;
//        };
//
//        spl_autoload_register($autoloadController);
//        spl_autoload_register($autoloadModel);
//        spl_autoload_register($autoloadCore);
//    }
}