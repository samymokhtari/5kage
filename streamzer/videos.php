
<?php

/* Lis les vidéos du répertoire .mp4 seulement */
function readVideos($directory){
    if ($dir = opendir($directory)) {
        echo "<div class='dropdown'>";
        echo "<a class='btn btn-block dropdown-toggle' href='#' role='button' id='dropdownMenuLink' 
                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Épisodes</a>";
        echo "<div class='dropdown-menu' id='videos' aria-labelledby='dropdownMenuLink'>";
        
        $videos = [];

        while($file = readdir($dir)) {
            $path = $directory .'/'. $file;
            $mimeType = mime_content_type($path);
            if($mimeType == "video/mp4"){
                $title = basename($path,".mp4");
                $videos[$file] = $title;
            }
        }
        sort($videos);
        foreach($videos as $key => $value){
            echo "<a class='dropdown-item' data-value='$value' data-toggle='list' role='tab' href='$key'>$value</a>";
        }
        echo "</div></div>";
    }
}

?>
