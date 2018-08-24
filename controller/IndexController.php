<?php

class IndexController extends AppController implements ControllerInterface{

    public function getHtml(){

        $a = parent::getView("index.html", ['stringKey' => 'This is our first template :)']);

        return $a;
    }
}