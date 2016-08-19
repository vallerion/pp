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

    private $colors = [//, "#bf360c", "#01579b"
        ["#311b92", "#665C93"],
        ["#3e2723", "#7D554F"],
        ["#1a237e", "#646DC8"],
        ["#006064", "#388F93"],
        ["#1b5e20", "#538957"],
        ["#e65100", "#EAA179"],
        ["#b71c1c", "#CE6363"],
        ["#004d40", "#348678"],
        ["#4a148c", "#7A6299"],
        ["#0d47a1", "#597AAE"]
    ];

}
