<?php

/**
 * Basic View Core Class for handling template rendering.
 */

class ViewCore implements ViewCoreInterface{

    public function renderHtml(string $templatename, array $array = null) : array {

        if(file_exists('templates/' . $templatename)){

            $getHtml = file_get_contents('templates/' . $templatename);

            if($array != NULL){

                foreach($array as $key => $value){
                    
                    if(strpos($getHtml, $key)){
                        $getHtml = str_replace('%' . $key . '%', $value, $getHtml);
                    }
    
                }
    
                return ['success' => true, 'html' => $getHtml];
    
            }else{
    
                return ['success' => true, 'html' => $getHtml];
    
            }

        }else{
            return ['success' => false, 'message' => 'file_not_found'];
        }

    }
    
}