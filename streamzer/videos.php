
<?php

/* Lis les vidéos du répertoire .mp4 seulement */
function readVideos($directory){
    if ($dir = opendir($directory)) {
        echo "<div  class='dropdown'>";
        echo "<a class='btn btn-warning dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Épisodes
        </a>";
        echo "<div class='dropdown-menu dropdown-menu-lg-right' id='videos' aria-labelledby='dropdownMenuButton'>";
        
        $videos = [];

        while($file = readdir($dir)) {
            $path = $directory .'/'. $file;
            $mimeType = mime_content_type($path);
            if($mimeType == "video/mp4"){
                /*$title = str_replace('.mp4', '', $f);*/
                $title = basename($path,".mp4");
                $videos[$file] = $title;
                //echo "<a class='dropdown-item' data-toggle='list' role='tab' href='$file'>$title</a>";
            }
        }
        sort($videos);
        foreach($videos as $key => $value){
            echo "<a class='dropdown-item' data-toggle='list' role='tab' href='$key'>$value</a>";
        }
        echo "</div></div>";
    }
}

?>
