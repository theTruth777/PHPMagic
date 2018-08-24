<?php

class ErrorController implements ErrorControllerInterface {

    public function handle404Error(string $request = NULL) : string {

        $view = new ErrorView();

        return "Error found";
    }
}