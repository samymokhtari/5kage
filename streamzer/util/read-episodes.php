<?php

define('ANIME_DIRECTORY', '../animes/');
include 'functions.php';

$episodes = [];
/* Return animes seasons */
if(isset($_GET['anime']) && isset($_GET['season'])){
    $anime = $_GET['anime'];
    $season = $_GET['season'];
    if ($dir = opendir(ANIME_DIRECTORY.$anime.'/'.$season)) {           
        while($file = readdir($dir)) {
            $path = ANIME_DIRECTORY . $file .'/';
            if(!in_array($file, array(".",".."))) {
                array_push($episodes, str_replace('.mp4', '', $file));
            }
        }
    }
}
echo json_encode($episodes);
return $episodes;

?>