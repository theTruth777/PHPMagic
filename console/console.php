<?php

/**
 * This is the PHPMagic configuration Terminal.
 * It will help to maintain config settings of this framework.
 * 
 */

require_once "controller/ConsoleController.php";

$console = new ConsoleController();

if(count($argv) > 1 ){

    switch($argv[1]){

        case "route:show":

            $console->routeShow();

            break;

        case "route:add":

            $console->routeAdd();

            break;

        default:

            echo "Unknown parameter.";

            break;
    }
    
}else{

    $console->displayStartup();

}
