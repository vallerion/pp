<?php

namespace App\Helpers;

class Helper{

    public function filterHtml($input){

//        $filters = array(
//            '/<!--([^\[|(<!)].*)/'		=> '', // Remove HTML Comments (breaks with HTML5 Boilerplate)
//            '/(?<!\S)\/\/\s*[^\r\n]*/'	=> '', // Remove comments in the form /* */
//            '/\s{2,}/'			=> ' ', // Shorten multiple white spaces
//            '/(\r?\n)/'			=> '', // Collapse new lines
//        );

//        $output = preg_replace(array_keys($filters), array_values($filters), $input);

        $filters = array(
            "<br>" => " ",
            "<hr>" => " ",
        );

        $output = str_replace(array_keys($filters), array_values($filters), $input);

        return strip_tags($output);
    }

}
