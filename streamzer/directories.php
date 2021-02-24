<?php 
/* Lis le dossier du chemin passé en paramètre, affiche des boutons permettant de rediriger vers les sous dossiers trouvés. */
function readDirectory($name) {
    $animes = [];
    if ($dir = opendir($name)) {
        echo   "<div class='tree-view container'>
                    <div class='row'>
                        <div class='col'>
                            <h1 class='h1'>". strtoupper($name) ."</h1>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col'> 
                            <form action='index.php' method='get'>
                                <div class='block align-self-center'>";
        if($name!="animes") {
            $fullPath = explode('/', $name);
            $_SESSION["title"] = array_pop($fullPath);
            $backDir = '';
            $backDir = implode("/", $fullPath);
            echo                    "<button class='btn-lg btn-block btn-dark btn' type='submit' name='directory' value='$backDir'>Précedent</button>";
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
        echo "                  </div> 
                            </form>
                        </div> 
                    </div>
                </div>";
        
        closedir($dir);
    }
}
 
?>