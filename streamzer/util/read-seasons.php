<?php

define('ANIME_DIRECTORY', '../animes/');
include 'functions.php';

$seasons = [];
/* Return animes seasons */
if(isset($_GET['anime'])){
    $anime = $_GET['anime'];
    if ($dir = opendir(ANIME_DIRECTORY.$anime)) {           
        while($file = readdir($dir)) {
            $path = ANIME_DIRECTORY . $file .'/';
            if(str_starts_with($file,'Saison')){
                array_push($seasons, $file);
            }
        }
    }
}
echo json_encode($seasons);
return $seasons;

?>