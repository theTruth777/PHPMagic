<?php

include "src/autoloader.php";

$json = json_decode(file_get_contents('config/routes.json'), true);

if(empty($_REQUEST)){

    $requestController = $json['routes']['index']['controller'];

}else{

    //TODO: Implement GET arg parser
    
}

$controller = new $requestController();
echo $controller->getHtml();