<?php

interface LoggerInterface {

    public function logCurrentError(int $type, string $trace, string $message = NULL);

}