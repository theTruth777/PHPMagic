<?php

include "src/autoloader.php";

$getUrl = parse_url($_SERVER['REQUEST_URI']);

$json = json_decode(file_get_contents('config/routes.json'), true);

/**
 * Check, if our url string is defined as a route or not.
 * If not, we will cal the logger (depending on your configuration the error will be logged)
 */
if(array_key_exists($getUrl['path'], $json['routes'])){

   $requestController = $json['routes'][$getUrl['path']]['controller'];
   
   $controller = new $requestController();
   echo $controller->getHtml();

}else{

    $logger = new LoggerController();
    $logger->logCurrentError(404, 'index.php', $getUrl['path']);

    $urlRequestError = new ErrorController();
    echo $urlRequestError->handle404Error($getUrl['path'], "404");

}
