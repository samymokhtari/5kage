<?php

define('ANIME_DIRECTORY', '../animes/');

function read_animes(){
    $animes = [];
    if ($dir = opendir(ANIME_DIRECTORY)) {           
        while($file = readdir($dir)) {
            $path = ANIME_DIRECTORY . $file;
            if(is_dir($path) && !in_array($file, array(".",".."))){
                array_push($animes,$file);    
            }
        }
    }
    return $animes;
}

?>