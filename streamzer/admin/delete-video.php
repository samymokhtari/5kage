<?php 

function deleteFile($path){
    echo $path;
}

function readFiles() {
    $name = '../animes';
    if ($dir = opendir($name)) {
        while($file = readdir($dir)) {
            $path = $name .'/'. $file;
            if(is_dir($path) && !in_array($file, array(".",".."))){
                echo '
                    <div class="btn-group ">
                            <button class="btn btn-dark btn-block" type="button">'. $file .'</button>
                            <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                        <div class="dropdown-menu">';

                if($dir_anime = opendir($path)){
                    while($season = readdir($dir_anime)){
                        if(!in_array($season, array(".",".."))){
                            echo '
                                    <a class="dropdown-item" href="#">'. $season .'</a>
                            ';
                        }
                        
                    }
                }

                echo '</div></div>';
                
            }
        }
    }
}

?>

<!-- PARTIE HTML -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Supprimer un anime">
        <meta name="author" content="5KAGE">
        <title>Supprimer un anime</title>

        <link rel="icon" href="../assets/logo.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link href="css/style.css" rel="stylesheet">
        <link href="../css/footer.css" rel="stylesheet">
    </head>
    <body>
        <?php include("header.php"); ?>
        <main>

          <?php 
          
          if(isset($_POST['submit']) ){
            deleteFile('test');
          }
          ?>

          <div id="form-container">
            <form method='post' action='' enctype='multipart/form-data'>
              <div class="container w-50">
                <div class="row fields">
                  <div class="col">
                    <?php 
                        //include("../directories.php"); 
                        //readDirectory("../animes");
                        readFiles();
                    ?>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </main>

        <?php include("../footer.php"); ?>
    </body>
</html>