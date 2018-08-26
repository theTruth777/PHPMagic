<?php

class IndexController extends AppController implements ControllerInterface{

    public function getHtml() : string {

        return parent::getView("index.html", ['stringKey' => 'This is our first template :)', 'configTitle' => 'Hello']);
    }
}