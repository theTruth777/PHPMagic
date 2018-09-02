<?php

/**
 * This controller contains various helper method, for handling different operations on the terminal.
 */

class HelperController {

    public function readUrlJson() {

        return json_decode(file_get_contents("config/routes.json"), true);        
        
    }

    public function renderLine() {

        for($i = 0; $i < 50; $i++){echo '-';}

        echo "\n";
        
    }

    /**
     * Method for handling simple stdin terminal input
     */
    public function terminalinput() : string {

        $handle = fopen ("php://stdin","r");

        return fgets($handle);

    }

}