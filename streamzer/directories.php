<?php 
/* Lis le dossier du chemin passé en paramètre, affiche des boutons permettant de rediriger vers les sous dossiers trouvés. */
function readDirectory($name) {
    $animes = [];
    if ($dir = opendir($name)) {
        
        echo   "<h1 class='h1'>". strtoupper($name) ."</h1>
        <form action='index.php' method='get'>
                <div class='row row-cols-1 row-cols-md-3 g-4'>
 ";
        if($name!="animes") {
            $fullPath = explode('/', $name);
            $_SESSION["title"] = array_pop($fullPath);
            $backDir = '';
            $backDir = implode("/", $fullPath);
            
            echo                    "<button class='btn-lg btn-block btn-dark btn' type='submit' name='directory' value='$backDir'>Précedent</button>";
            while($file = readdir($dir)) {
                $path = $name .'/'. $file;
                if(is_dir($path) && !in_array($file, array(".",".."))){
                    array_push($animes,"<button class='btn-lg btn-dark btn-block btn' type='submit' name='directory' value='$path'>$file</button>");    
                }
            }
        }
        else {
            while($file = readdir($dir)) {
                $path = $name .'/'. $file;
                $path_encoded = str_replace(" ", '%20', $path);

                if(is_dir($path) && !in_array($file, array(".",".."))){
                    array_push($animes,
                    "<div class=\"col-12 col-md-4\">
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
        echo "                  
                </form>
            </div> 
                     ";
        
        closedir($dir);
    }
}
 
?>