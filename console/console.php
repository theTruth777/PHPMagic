<?php

class Console {

    public function renderLine(){

        for($i = 0; $i < 50; $i++){echo '-';}

        echo "\n";

    }

    public function showRoutes(){

        $json = json_decode(file_get_contents("config/routes.json"), true);
        
        echo "Route \tController\n";

        $this->renderLine();

        foreach($json['routes'] as $key => $value){

            echo $key . "\t" . $value['controller'] . "\n";

        }

    }
}

$console = new Console();

if(count($argv) >1 ){

    switch($argv[1]){

        case "route:show":

            $console->showRoutes();

            break;

    }
    
}else{

    echo "PHPMagic Configuration Terminal\n";
    
    $console->renderLine();

    echo "route:show \t Display current URL-Routes\n";

}
