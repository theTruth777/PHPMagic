<?php

class ErrorController implements ErrorControllerInterface {

    public function handle404Error(string $request = NULL) : string {

        $view = new ErrorView();
        
        $render = $view->render404($request);

        if($render['success'] === true){

            return $render['content'];

        }else{

            return;

        }

    }
}