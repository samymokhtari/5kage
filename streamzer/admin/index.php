
<?php 

define("ANIME_PICTURE", "picture");

/* Import des fichiers PHP nécessaire */
include '../videos.php';
include '../directories.php';

?>

<!-- PARTIE HTML -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="5KAGE">
        <title>Streamzer - Administration </title>

        <link rel="icon" href="../assets/logo.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="//cdn.sc.gl/videojs-hotkeys/latest/videojs.hotkeys.min.js"></script>
        
        <link href="css/index.scss" rel="stylesheet">
    </head>
    <body>
        <?php include("header.php"); ?>
        <main>
            <h2 class="ml-3 mt-3">Animes</h2>
            <div class="list-group mt-1 mb-4">
                <a href="add-anime.php" class="list-group-item list-group-item-action">Ajouter un anime</a>
                <a href="#edit-anime" class="list-group-item list-group-item-action">Éditer un anime</a>
                <a href="delete-anime.php" class="list-group-item list-group-item-action">Supprimer un anime</a>
            </div>
            <h2 class="ml-3">Épisodes</h2>
            <div class="list-group mt-1 mb-4">
                <a href="add-video.php" class="list-group-item list-group-item-action">Ajouter du contenu</a>
                <a href="#edit-video" class="list-group-item list-group-item-action">Éditer du contenu</a>
                <a href="delete-video.php" class="list-group-item list-group-item-action">Supprimer du contenu</a>
            </div>
        </main>

        <?php include("../footer.php"); ?>
    </body>
</html>

