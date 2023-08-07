<?php
/***** CALCUL DU TEMPS DE LECTURE *****/
 /* error_reporting(E_ERROR | E_PARSE | E_WARNING);
    ini_set('display_errors', '1'); */
    
	function countWord($string){
        return str_word_count($string);
    }