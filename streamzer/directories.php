<?php 

define("ANIME_PICTURE", "picture");

/* Lis le dossier du chemin passé en paramètre, affiche des boutons permettant de rediriger vers les sous dossiers trouvés. */
function readDirectory($name) {
    $animes = [];
    $homepage = false;
    $fullPath = explode('/', $name);
    $_SESSION["title"] = array_pop($fullPath);
    $backDir = implode("/", $fullPath);

    if ($dir = opendir($name)) {
        echo   "<h1 class='h1'>". strtoupper($name) ."</h1>
                <form action='index.php' method='get'>
                    <div class='row'>";
                        
        if($name!="animes") {
            if($backDir == "animes") 
                $picture_directory = $name;
            else 
                $picture_directory = $backDir;
            $anime_picture_path = $picture_directory."/". ANIME_PICTURE;
            if(file_exists($anime_picture_path . ".jpg"))
                $image_anime = $anime_picture_path . ".jpg";
            else if (file_exists($anime_picture_path . ".png"))
                $image_anime = $anime_picture_path . ".png";
            
            echo "  <div class='col-12 col-md-7'>
                        <picture data-content-picture>
                            <img data-content-img class='img-anime-large-size line-animated' alt=' ' src=\"$image_anime\">
                        </picture>
                    </div>
                    <div data-content-seasons class='col-12 col-md-5'>";
            
            echo "      <button class='btn btn-block btn-secondary btn-back' type='submit' name='directory' value='$backDir'>Précedent</button>";
            while($file = readdir($dir)) {
                $path = $name .'/'. $file;
                if(is_dir($path) && !in_array($file, array(".",".."))){
                    array_push($animes,"<button class='btn btn-block btn-secondary' type='submit' name='directory' value='$path'>$file</button>");    
                }
            }
        }
        else {
            $homepage = true;
            while($file = readdir($dir)) {
                $path = $name .'/'. $file;
                $path_encoded = str_replace(" ", '%20', $path);

                if(is_dir($path) && !in_array($file, array(".",".."))){
                    array_push($animes,
                    "<div class=\"col-12 col-md-6 col-lg-4 col-xl-3\">
                        <div class=\"card zoom\">
                            <!-- \"$name\"/pictures.jpg -->
                            <button name=\"directory\" value=\"$path\">
                                <picture>
                                    <img 
                                    data-content-img 
                                    class=\"card-img-top\" 
                                    name=\"directory\" 
                                    value=\"$path\" 
                                    alt=\"anime-img\"
                                    onerror=\"if (this.src != '". $path ."/picture.jpg') this.src = 'assets/noimg.jpg';\" 
                                    src= ".$path_encoded ."/picture.jpg>
                                </picture>        
                            
                            <div class=\"overlay\">
                                <h5 class=\"card-title overlay-text\">$file</h5>
                            </div>
                            </button>
                        </div>
                    </div>");
                }
            }
            
        }
        
        while($file = readdir($dir)) {
            $path = $name .'/'. $file;
            if(is_dir($path) && !in_array($file, array(".",".."))){
                array_push($animes,"<button class='btn-lg btn-dark btn-block btn' type='submit' name='directory' value='$path'>$file</button>");    
            }
        }
        sort($animes);
        foreach($animes as $anime){
            echo $anime;
        }
        
        readVideos($name); 
        echo "  </form>
            </div>";
        if($homepage) {
        echo "</div>"; /* Fermeture de la colonne si on est dans la recherche d'un épisode */
        }
        
        closedir($dir);
    }
}
 
?>