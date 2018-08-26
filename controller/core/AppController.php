<?php

/**
 * This is the AppController. It contains all basic methods of our framework that we need in order
 * to work correctly
 */

class AppController implements AppInterface{

    private $errorLogger;


    public function __construct(){

        $this->errorLogger = new LoggerController();

    }


    public function getView(string $templateName, array $array = null) : string {

        $viewCore = new ViewCore();

        $getView = $viewCore->renderHtml($templateName, $array);
        
        if($getView['success'] === true){

            return $getView['html'];

        }else{

            $this->errorLogger->logCurrentError(500, __CLASS__);

            $errorController = new ErrorView();

            $handleError = $errorController->render500();

            return $handleError['content'];

        }

        
    }

    
}