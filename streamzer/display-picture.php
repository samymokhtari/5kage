<?php 

define("ANIME_PICTURE", "picture");

/* Display the picture of the anime when selected */
function display_picture($dir) {
    $image_anime='';
    $fullpath = explode('/', $dir);
    $_SESSION["title"] = array_pop($fullpath);
    $back_directory = implode("/", $fullpath);
    if($back_directory == "animes") 
        $picture_directory = $dir;
    else 
        $picture_directory = $back_directory;
    $anime_picture_path = $picture_directory."/". ANIME_PICTURE;
    if(file_exists($anime_picture_path . ".jpg"))
        $image_anime = $anime_picture_path . ".jpg";
    else if (file_exists($anime_picture_path . ".png"))
        $image_anime = $anime_picture_path . ".png";
    return "<picture data-content-picture>
                <img 
                    data-content-img 
                    class='img-anime-large-size line-animated' 
                    alt='default anime picture' 
                    title='".$_SESSION["title"]."' 
                    onerror=\"if ('' == '". $image_anime ."') this.src = './assets/404_not_found.png';\"
                    src=\"$image_anime\"
                >
            </picture>";
    
}

?>
