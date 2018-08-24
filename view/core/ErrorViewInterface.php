<?php

interface ErrorViewInterface{

    public function renderHtml(string $request = NULL) : array;

}