<?php

require_once "HelperController.php";

class ConsoleController extends HelperController {

    public function displayStartup(){

        echo "PHPMagic Configuration Terminal\n";
    
        HelperController::renderLine();
    
        echo "route:show \t Display current URL-Routes\n";
        echo "route:add \t Add a new url-route\n";
    }

    public function routeShow() {

        $json = HelperController::readConfigJson();
        
        echo "Route \tController\n";

        $this->renderLine();

        foreach($json['routes'] as $key => $value){

            echo $key . "\t" . $value['controller'] . "\n";

        }

    }

    public function routeAdd() {

        $input = HelperController::terminalinput();

        echo $input;
    }
}