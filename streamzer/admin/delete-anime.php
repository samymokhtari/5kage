<?php 

include '../util/read-animes.php';
include '../util/functions.php';

function deleteAnime($anime){
    try {
      deleteDir(ANIME_DIRECTORY.$anime);
      echo "<p class='alert alert-success'>L'anime ".$anime." à été supprimé avec succès !</p>";
    }catch (Exception $error) {
      echo "<p class='alert alert-danger'> Impossible de supprimer l'anime ".$anime."</p>";
    }
    
}



/* Display animes as a dropdown */
function display_animes_as_dropdown() {
	$animes = read_animes();
	echo '<select class="d-flex w-100" id="dropdown_animes" name="cscf[anime]">';
	foreach($animes as $anime) 
		echo '<option data-value="'.$anime.'">'. $anime .'</option>';

	echo '</select>';
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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


        <link href="css/index.scss" rel="stylesheet">
    </head>
    <body>
      <?php include("header.php"); ?>
      <main>
        <form id="form-container" method='post' action='delete-anime.php' enctype='multipart/form-data'>
          <div class="container">
            <div class="row">
              <div class="col-12 col-md-9 col-lg-6 fields ml-auto mr-auto">
              <h1>Supprimer un anime</h1>
                <?php 
                    display_animes_as_dropdown();
                ?>
                <button id='btn-delete' class='w-100 btn btn-danger' value='submit' type='submit'>Supprimer</button>
                <?php 
                  if (isset($_POST['cscf']['anime'])) {
                    deleteAnime($_POST['cscf']['anime']);
                    header("Refresh:2"); // Refresh la page après 2 secondes
                  }
                ?>
              </div>
            </div>
          </div>
        </form>
      </main>

      <?php include("../footer.php"); ?>
      <script>
        $('#btn-delete').click(function() {
          confirm("Tu es sûr de vouloir supprimer cet anime ?\nOK ou Annuler.")
        }) 
      </script>
    </body>
</html>