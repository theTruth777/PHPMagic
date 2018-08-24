<?php

interface ErrorControllerInterface {

    public function handle404Error(string $request = NULL) : string;

}