<?php
/**
* Highlight a file and show line numbering
*
* @param        string  $data       The string to add line numbers to
* @param        bool    $funclink   Automatically link functions to the manual
* @param        bool    $return     return or echo the data
* @author       Aidan Lister <aidan@php.net>
* @version      1.0.0
*/
function highlight_file_linenum($data, $funclink = true, $return = false)
{
    // Init
    $data = explode ('<br />', $data);
    $start = '<span style="color: black;">';
    $end   = '</span>';
    $i = 1;
    $text = '';

    // Loop
    foreach ($data as $line) {
        $text .= $start . $i . ' ' . $end .
            str_replace("\n", '', $line) . "<br />\n";
        ++$i;
    }

    // Optional function linking
    if ($funclink === true) {
        $keyword_col = ini_get('highlight.keyword');
        $manual = 'http://www.php.net/function.';

        $text = preg_replace(
            // Match a highlighted keyword
            '~([\w_]+)(\s*</span>)'.
            // Followed by a bracket
            '(\s*<span\s+style="color: ' . $keyword_col . '">\s*\()~m',
            // Replace with a link to the manual
            '<a href="' . $manual . '$1">$1</a>$2$3', $text);
    }
    
    // Return mode
    if ($return === false) {
        echo $text;
    } else {
        return $text;
    }
}

?>