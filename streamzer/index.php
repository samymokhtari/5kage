
<?php 
/* Import des fichiers PHP nécessaire */
include 'videos.php';
include 'directories.php';

?>

<!-- PARTIE HTML -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Streamzer, la meilleure plateforme de contenu totalement illégal en ligne.">
        <meta name="author" content="Hocem Boualleg, Samy Mokhtari">
        <title>Streamzer</title>

        <link rel="icon" href="./assets/logo.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
        <!-- VIDEO.JS -->
        <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
        <link href="https://unpkg.com/@videojs/themes@1/dist/fantasy/index.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
    </head>
    <body>
        <?php include("header.php"); ?>
        <main>
            <section>
            <?php
            /* Si un paramètre est passé dans la requête (exemple: http://localhost/streaming/index.php?directory=animes%2FMy+Hero+Academia) affiche le dossier en question */
            if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['directory']))
            {
                readDirectory($_GET['directory']);
            }
            /* Sinon affiche le dossier racine animes*/
            else
            {
                readDirectory("animes");
            }   
            ?>
            </section>
            
            <section id="div-video" class="vjs-fade-out fadeInOpacity">
                    <div class="video-informations">
                        <label for="my-video" id="title"></label>
                    </div>

                    <video 
                    controls 
                    type="video/mp4" 
                    preload="auto" 
                    id="my-video" 
                    controlsList="nodownload">
                        Sorry, your browser doesn't support embedded videos. 😞
                    </video>
                    <div class="video-controls">
                        <button id="previous" value="" class="btn btn-outline-info" action="loadVideo()" >Épisode précédent</button>
                        <button id="next" value="" class =" btn btn-outline-info" action="loadVideo()">Épisode suivant</button>
                    </div>
            </section>
        </main>

        <?php include("footer.php"); ?>
    </body>
</html>

<script type="text/javascript" src="js/script.js"></script>
<script src="https://vjs.zencdn.net/7.10.2/video.js"></script>
