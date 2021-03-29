<script src="./js/video-upload.js"></script>

<?php

include '../util/read-animes.php';

/* Upload les fichiers reçus dans le dossiers anime et la saison correspondante */
function uploadFiles() {

  // Count total files
  $countfiles = count($_FILES['file']['name']); 
	echo "salut";
  if ( (empty($_POST['cscf']['anime'])) || (empty($_POST['cscf']['season'])) || ($countfiles == 1 && empty($_FILES['file']['name'][0])) ) {
	echo ("<p class='alert alert-danger text-center' role='alert'>Des informations sont manquantes </p>");
	return;
  }
  $name = $_POST['cscf']['anime'];
  $season = $_POST['cscf']['season'];
  
  $current_anime_directory = "../animes/".$name."/";
  $fullpath = $current_anime_directory."/".$season."/";
  if(!file_exists($fullpath)){
	mkdir($fullpath, 0777, true);
  }

  /* Upload all episodes */
  $filesUploaded = [];
  // Looping all files
  for($i=0;$i<$countfiles;$i++){
	$filename = $_FILES['file']['name'][$i];
	$filesize = number_format(($_FILES['file']['size'][$i] / 1000000),2);

	// Upload file
	move_uploaded_file($_FILES['file']['tmp_name'][$i],$fullpath.$filename);
	array_push($filesUploaded, "<li>Fichier : <strong>$filename</strong> 	→  $filesize Mo ✔</li>");
  }
  foreach($filesUploaded as $msg){
	echo $msg;
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
		<meta name="description" content="Ajouter un anime">
		<meta name="author" content="5KAGE">
		<title>Ajouter une vidéo</title>

		<link rel="icon" href="../assets/logo.png" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
		<!-- Bootstrap -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		
		<link href="css/index.scss" rel="stylesheet">

		<!-- JS -->
		<script type="text/javascript" src="js/add-video.js"></script>
	<body>
		<?php include("header.php"); ?>
		<main>

			<?php 
			if(isset($_POST['submit_videos']) ){
				uploadFiles();
			}
			?>

			<div data-add-video id="form-container">
				<form id="form-add-videos" method='post' action='add-video.php' enctype='multipart/form-data'>
					<div class="container">
						<div class="row fields">
							<div class="col-12">
								<h1 class="mb-4">AJOUTER DU CONTENU</h1>
								<div data-admin-animes>
									<?php 
									display_animes_as_dropdown();
									?>
								</div>
								<div data-admin-seasons>
									<select disabled class=" d-flex w-100 disabled" id="dropdown_seasons" name="cscf[season]">
										<!-- Seasons will be inserted here by jQuery -->
									</select>
								</div>

								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" accept=".mp4" name="file[]" id="file" multiple class="custom-file-input">
										<label class="custom-file-label" for="file">Sélectionner les épisodes à envoyer</label>
									</div>
									<div class="input-group-append">
										<input class="btn btn-success input-group-text" type='submit' name='submit_videos' value='Envoyer' onclick='upload_videos();'/>
									</div>
								</div>
								<p class="p-3 mb-2 alert alert-warning">Ne pas upload plus de 10 Go à la fois</p>
								<div class='progress' id="progress_div">
									<div class='bar' id='bar1'></div>
									<div class='percent' id='percent1'>0%</div>
								</div>
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

