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

    public function getMaterialColor($index){

//        $index = intval($index);
//        $index %= 10;

        return $this->colors[$index%10];

    }

    private $colors = [
        "#311b92", "#3e2723",//, "#bf360c", "#01579b"
        "#1a237e", "#e65100", "#b71c1c", "#004d40",
        "#006064", "#4a148c", "#1b5e20", "#0d47a1",
    ];

}
