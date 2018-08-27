<?php

class LoggerController implements LoggerInterface {

    /**
     * Use this function in order to log anything that you want. You have to provide a type 
     * (404, 500 etc.) and a trace (class name or namespace + classname where it error occurred).
     * 
     * Make sure to set the right settings in your configuration.json.
     * 
     * This controller will only log internal errors. It won't show anything to the frontend (for that you have to
     * use the ErrorView).
     * 
     * In order to use the Logger just call it in your class.
     */
    public function logCurrentError(int $type, string $trace, string $message = NULL) {

        if(file_exists("config/config.json")){

            $json = file_get_contents("config/config.json");

            $config = json_decode($json, true);

            if(array_key_exists("errorLogging", $config)){

                if(array_key_exists("error-" . $type, $config["errorLogging"])){

                    if(array_key_exists("enable", $config["errorLogging"]["error-" . $type])){

                        if(array_key_exists("path", $config["errorLogging"]["error-" . $type])){

                            if($config["errorLogging"]["error-" . $type]["enable"] === true){

                                if(file_exists($config["errorLogging"]["error-" . $type]['path'])){

                                    $date = date('Y-m-d H:i:s');
    
                                    $message = $date . "\t" . $trace . "\t" . $message . "\n";
        
                                    file_put_contents($config["errorLogging"]["error-" . $type]['path'] . $type . ".log", $message, FILE_APPEND);

                                }

                            }

                        }
                        
                    }

                }

            }

        }
        
    }

}