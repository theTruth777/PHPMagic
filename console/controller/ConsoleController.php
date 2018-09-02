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

        $json = HelperController::readUrlJson();
        
        echo "Route \tController\n";

        $this->renderLine();

        foreach($json['routes'] as $key => $value){

            echo $key . "\t" . $value['controller'] . "\n";

        }

    }

    /**
     * This method will add a new URL-route and create a new controller for the route.
     * The user enters an input, the routes.json will be updated and a new controller file will be
     * created.
     */
    public function routeAdd() {

        echo "Please enter the new URL route:\t";

        $input = HelperController::terminalinput();

        if($input !== ""){

            $json = HelperController::readUrlJson();

            /**
             * In case the user entered '/' we just remove it
             */
            if (substr($input, 0, 1) === '/') {

                $input = substr($input, 1);

            }

            /**
             * Remove the new line from the string
             */
            $input = trim(preg_replace('/\s\s+/', ' ', $input));

            $json['routes']['/' . $input]['controller'] = '/' . $input;

            $controllerName = ucfirst($input) . 'Controller.php';

            $className = ucfirst($input) . 'Controller';

            $controllerTemplate = file_get_contents('console/template/urlControllerTemplate.txt');

            $controllerTemplate = str_replace('@ClassName@', $className, $controllerTemplate);

            file_put_contents('controller/' . $controllerName, $controllerTemplate);

            $json = json_encode($json);

            echo $json;

            //file_put_contents("config/routes.json", $json);

        }else{

            echo "No route name given.\n";

        }

    }
}