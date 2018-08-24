<?php

interface ViewCoreInterface {

    public function renderHtml(string $templatename, array $array = null) : array;
    
}