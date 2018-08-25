<?php

interface ViewCoreInterface {

    public function renderHtml(string $templatename, array $array = null) : array;

    public function buildHtmlTemplate(string $template, string $path) : string;
    
}