<?php

interface ErrorViewInterface{

    public function render404(string $request = NULL) : array;

    public function render500() : array;

}