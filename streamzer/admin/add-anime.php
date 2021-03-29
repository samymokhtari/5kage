<script src="./js/video-upload.js"></script>

<?php
define("ANIME_PICTURE", "picture");

/* Upload les fichiers reçus dans le dossiers anime et la saison correspondante */
function uploadFiles() {

  echo(isset($_POST['name']));
  echo(isset($_POST['season']));
  echo(isset($_FILES['picture']));

  if ( !(isset($_POST['name']) && !empty($_POST['name'])) || !(isset($_POST['season']) && !empty($_POST['season'])) || !(isset($_FILES['picture'])  && !empty($_FILES['picture']))) {
    echo ("<p class='alert alert-danger text-center' role='alert'>Des informations sont manquantes</p>");
    return;
  }

  /* Verifier ici si l'image est pas déjà dans le répertoire */
  $name = $_POST['name'];
  $season = $_POST['season'];
  $current_anime_directory = "../animes/".$name."/";
  $fullpath = $current_anime_directory."/Saison ".$season."/";
  if(!file_exists($fullpath)){
    mkdir($fullpath, 0777, true);
  }

  /* Upload anime picture */
  $picture_name = $_FILES['picture']['name'];
  move_uploaded_file($_FILES['picture']['tmp_name'], $current_anime_directory.$picture_name);
  $array_decomposed = explode('.', $picture_name);
  $extension = array_pop($array_decomposed);
  rename($current_anime_directory.$picture_name, $current_anime_directory . ANIME_PICTURE. '.' . $extension);

  echo ("<p class='alert alert-success text-center' role='alert'> La saison ". $season ." de ". $name ." à bien été créé </p>");
} 
?>

<!-- PARTIE HTML -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Ajouter du contenu">
        <meta name="author" content="5KAGE">
        <title>Ajouter une vidéo</title>

        <link rel="icon" href="../assets/logo.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
        <link href="css/index.scss" rel="stylesheet">
    <body>
        <?php include("header.php"); ?>
        <main>

          <?php 
          if(isset($_POST['submit']) ){
            uploadFiles();
          }
          ?>

          <div id="form-container">
            <form method='post' action='add-anime.php' enctype='multipart/form-data'>
              <div class="container">
                <div class="row">
                  <div class="col-12 col-md-6 ml-auto mr-auto fields">
                    <h1 class="mb-4">AJOUTER UN ANIME</h1>
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Anime</span>
                      </div>
                      <input type="text" name="name" placeholder="Nom de l'anime" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Saison</span>
                      </div>
                      <input type="number" name="season" min=1 max=99 placeholder="Numéro de la saison" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" name="picture" accept=".jpg,.png" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Image de l'anime</label>
                      </div>
                    </div>
                    <div class="input-group-append d-block float-right">
                        <input class="btn btn-success input-group-text" type='submit' name='submit' value='Envoyer'/>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </main>

        <?php include("../footer.php"); ?>
    </body>
</html>

