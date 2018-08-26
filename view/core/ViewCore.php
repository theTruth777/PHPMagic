<?php

/**
 * Basic View Core Class for handling template rendering.
 */

class ViewCore implements ViewCoreInterface{

    private $htmlHeaderPath = 'templates/appTemplate/header.html';

    private $htmlFooterPath = 'templates/appTemplate/footer.html';


    public function buildHtmlTemplate(string $template, string $path) : string {

        if(strpos($template, '@template_header@') !== false){

            return str_replace("@template_header@", file_get_contents($path), $template);

        }

        if(strpos($template, '@template_footer@') !== false){

            return str_replace("@template_footer@", file_get_contents($path), $template);

        }

        return $template;
    }


    public function renderHtml(string $templatename, array $array = null) : array {

        if(file_exists('templates/' . $templatename)){

            $getHtml = file_get_contents('templates/' . $templatename);

            /**
             * Build the HTML-Document header and the footer
             */
            $getHtml = $this->buildHtmlTemplate($getHtml, $this->htmlHeaderPath);

            $getHtml = $this->buildHtmlTemplate($getHtml, $this->htmlFooterPath);

            /**
             * Insert our key-values in the HTML-Document
             */
            if($array != NULL){

                foreach($array as $key => $value){

                    if(strpos($getHtml, $key)){
                        $getHtml = str_replace('%' . $key . '%', $value, $getHtml);
                    }
    
                }
    
            }

            return ['success' => true, 'html' => $getHtml];

        }else{

            return ['success' => false, 'message' => 'file_not_found'];
            
        }

    }
    
}