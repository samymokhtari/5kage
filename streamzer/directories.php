<?php 

/* Lis le dossier du chemin passé en paramètre, affiche des boutons permettant de rediriger vers les sous dossiers trouvés. */
function readDirectory($name) {
    $animes = [];
    $homepage = false;
    $fullpath = explode('/', $name);
    $_SESSION["title"] = array_pop($fullpath);
    $back_directory = implode("/", $fullpath);

    if ($dir = opendir($name)) {           
        if($name!="animes") {
            
            echo "<div data-content-seasons class='col-12 col-md-5'>
                    <button class='btn btn-block btn-secondary btn-back' type='submit' name='directory' value='$back_directory'>Précedent</button>";
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
                $image_anime='';
                $path = $name .'/'. $file;
                $anime_picture_path = $path."/". ANIME_PICTURE;
                if(file_exists($anime_picture_path . ".jpg"))
                    $image_anime = $anime_picture_path . ".jpg";
                else if (file_exists($anime_picture_path . ".png"))
                    $image_anime = $anime_picture_path . ".png";

                $image_anime = str_replace(" ", '%20', $image_anime);

                if(is_dir($path) && !in_array($file, array(".",".."))){
                    array_push($animes,
                    "<div class=\"col-12 col-md-6 col-lg-4 col-xl-3\">
                        <div class=\"card zoom\">
                            <button name=\"directory\" value=\"$path\">
                                <picture>
                                    <img 
                                    data-content-img 
                                    class=\"card-img-top\" 
                                    name=\"directory\" 
                                    value=\"$path\" 
                                    alt=\"anime-img\"
                                    onerror=\"if ('' == '". $image_anime ."') this.src = 'assets/404_not_found.png';\" 
                                    src= ". $image_anime .">
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