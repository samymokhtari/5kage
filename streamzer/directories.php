<?php 
/* Lis le dossier du chemin passé en paramètre, affiche des boutons permettant de rediriger vers les sous dossiers trouvés. */
function readDirectory($name) {
    if ($dir = opendir($name)) {
        echo "<div class='tree-view'>";
        echo '<h1 class="h1">'. strtoupper($name) .'</h1>';
        echo '<form action="index.php" method="get">';
        echo '<div class="list-group">';
         // Classe perso représentant englobant l'arborescence des dossiers
        if($name!="animes") {
            $fullPath = explode('/', $name);
            $_SESSION["title"] = array_pop($fullPath);
            $backDir = '';
            $backDir = implode("/", $fullPath);
            echo "<button class='list-group-item list-group-item-action' type='submit' name='directory' value='$backDir'>Précedent</button>";
        }
        while($file = readdir($dir)) {
            $path = $name .'/'. $file;
            if(is_dir($path) && !in_array($file, array(".",".."))){
                echo "<button class='list-group-item list-group-item-action' type='submit' name='directory' value='$path'>$file</button>";
            }
        }
        readVideos($name); 
        echo '</div></div>';
        echo '</form>';

        
        closedir($dir);
    }
}
 
?>