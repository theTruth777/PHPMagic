<?php

interface ErrorViewInterface{

    public function render404(string $request = NULL) : array;

}