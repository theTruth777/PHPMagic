<?php

interface AppInterface {

    public function getView(string $templateName, array $array = null) : string;

}