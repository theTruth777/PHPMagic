<?php

class LoggerController implements LoggerInterface {

    /**
     * Use this function in order to log anything that you want. You have to provide a type 
     * (404, 500 etc.) and a trace (class name or namespace + classname where it error occurred).
     * 
     * Make sure to set the right settings in your configuration.json.
     */
    public function logCurrentError(int $type, string $trace) {

        if(file_exists("config/config.json")){

            $json = file_get_contents("config/config.json");

            $config = json_decode($json, true);

            if(array_key_exists("errorLogging", $config)){

                if(array_key_exists("error-" . $type, $config["errorLogging"])){

                    if(array_key_exists("enable" . $type, $config["errorLogging"]["error-" . $type])){

                        if($config["errorLogging"]["error-" . $type]["enable"] === true){

                            file_put_contents($config["errorLogging"][["error-" . $type]]['path'] . $trace, FILE_APPEND);

                        }

                    }

                }

            }

        }
        
    }

}