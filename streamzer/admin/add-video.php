<script src="./js/video-upload.js"></script>

<?php


/* Upload les fichiers reçus dans le dossiers anime et la saison correspondante */
function uploadFiles() {
  // Count total files
  $countfiles = count($_FILES['file']['name']); 

  if ( (empty($_POST['name'])) || (empty($_POST['season'])) || ($countfiles == 1 && empty($_FILES['file']['name'][0])) ) {
    echo ("<p class='alert alert-danger text-center' role='alert'>Des informations sont manquantes </p>");
    return;
  }
  $name = $_POST['name'];
  $season = $_POST['season'];
  
  $fullpath = "../animes/".$name."/Saison ".$season."/";
  if(!file_exists($fullpath)){
    mkdir($fullpath, 0777, true);
  }

  $filesUploaded = [];
  // Looping all files
  for($i=0;$i<$countfiles;$i++){
    $filename = $_FILES['file']['name'][$i];
    $filesize = number_format(($_FILES['file']['size'][$i] / 1000000),2);

    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'][$i],$fullpath.$filename);
    array_push($filesUploaded, "<li>Fichier : <strong>$filename</strong> 	→  $filesize Mo ✔</li>");
  }
  echo ("<p class='alert alert-success text-center' role='alert'>Les épisodes de la saison <strong>". $_POST['season'] ."</strong> pour l'anime <strong>". $_POST['name'] ."</strong> ont bien été téléchargés.</p>");
  foreach($filesUploaded as $msg){
    echo $msg;
  }
} 



?>

<!-- PARTIE HTML -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Ajouter un anime">
        <meta name="author" content="Hocem Boualleg, Samy Mokhtari">
        <title>Ajouter une vidéo</title>

        <link rel="icon" href="../assets/logo.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link href="css/style.css" rel="stylesheet">
        <link href="../css/header.css" rel="stylesheet">
        <link href="../css/footer.css" rel="stylesheet">
    </head>
    <body>
        <?php include("header.php"); ?>
        <main>

          <?php 
          if(isset($_POST['submit']) ){
            uploadFiles();
          }
          ?>

          <div id="form-container">
            <form method='post' action='' enctype='multipart/form-data'>
              <div class="container w-50">
                <div class="row fields">
                  <div class="col">
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Anime</span>
                      </div>
                      <input type="text" name="name" placeholder="Nom de l'anime.." class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Saison</span>
                      </div>
                      <input type="number" name="season" min=1 max=99 placeholder="Numéro de la saison.." class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" accept=".mp4" name="file[]" id="file" multiple class="custom-file-input">
                        <label class="custom-file-label" for="file">Sélectionner les épisodes à envoyer</label>
                      </div>
                      <div class="input-group-append">
                        <input class="btn btn-success input-group-text" type='submit' name='submit' value='Envoyer'/>
                      </div>
                    </div>
                    <p class="p-3 mb-2 text-light bg-dark">Veuillez ne pas upload plus de 5 Go à la fois.</p>
                  </div>
                  <ul id="file-uploaded">

                  </ul>
                </div>
              </div>
            </form>
          </div>
        </main>

        <?php include("../footer.php"); ?>
    </body>
</html>

