<?php

/**
 * This is the ErrorView handler. It is responsible for rendering error templates for the user
 * frontend.
 */

class ErrorView implements ErrorViewInterface{

    private function insertContent(string $html, array $content) : string {

        foreach($content as $key => $value){

            if(strpos($html, $key) !== false){

                $html = str_replace($key, $value, $html);

            }

        }

        return $html;

    }

    public function render404(string $request = NULL) : array {

        if(file_exists("templates/appTemplate/error.html")){

            $getHtml = file_get_contents("templates/appTemplate/error.html");

            $buildHtml = $this->insertContent($getHtml, ["%errorTitle%" => "404 Error", "%errorType%" => "404", "%errorMessage%" => "The requested URL was not found"]);
    
            return ["success" => true, "content" => $buildHtml];

        }else{

            return ["success" => false];

        }

    }

    public function render500() : array {
        
        if(file_exists("templates/appTemplate/error.html")){

            $getHtml = file_get_contents("templates/appTemplate/error.html");

            $buildHtml = $this->insertContent($getHtml, ["%errorTitle%" => "500 Error", "%errorType%" => "500", "%errorMessage%" => "Internal Server Error"]);
    
            return ["success" => true, "content" => $buildHtml];

        }else{

            return ["success" => false];

        }

    }

}