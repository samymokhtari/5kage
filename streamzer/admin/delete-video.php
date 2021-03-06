<?php 

include '../util/read-animes.php';

function deleteFile($path){
    echo $path;
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
        <script type="module" src="js/delete-video.js"></script>
        <script type="module" src="js/add-video.js"></script>

        <link href="css/index.scss" rel="stylesheet">
    </head>
    <body>
      <?php include("header.php"); ?>
      <main>

        <?php 
        
        if(isset($_POST['submit'])) {
          deleteFile('test');
        }
        ?>

        <form id="form-container" method='post' action='' enctype='multipart/form-data'>
          <div class="container">
            <div class="row">
              <div class="col-12 col-md-9 col-lg-6 fields ml-auto mr-auto">
              <h1>Supprimer du contenu</h1>
              <h5>(en développement)</h5>
                <?php 
                    display_animes_as_dropdown();
                ?>
                <div data-admin-seasons>
									<select disabled class=" d-flex w-100 disabled" id="dropdown_seasons" name="cscf[season]">
										<!-- Seasons will be inserted here by jQuery -->
                    <option selected='selected'>-</option>
									</select>
								</div>
                <div data-admin-episodes>
                </div>
              </div>
            </div>
          </div>
        </form>
      </main>

      <?php include("../footer.php"); ?>
    </body>
</html>