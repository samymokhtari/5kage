
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-quality-levels/2.0.9/videojs-contrib-quality-levels.min.js"></script>
        <script src="./node_modules/videojs-hls-quality-selector/dist/videojs-hls-quality-selector.min.js"></script>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
    </head>
    <body>
        <?php include("header.php"); ?>
        <main>
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

            
            <div id="video" class="vjs-fade-out fadeInOpacity">
                <label for="my-video" id="title"></label>
                <video
                    id="my-video"
                    class="video-js vjs-big-play-centered vjs-theme-fantasy "
                    controls
                    preload="auto"
                    data-setup='{}'>
                    <!-- ./animes/My Hero Academia/Saison 3/01.mp4 -->
                    
                    <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a> 😞
                    </p>
                </video>
            </div>
        </main>

        <?php include("footer.php"); ?>
    </body>
</html>

<script type="text/javascript" src="js/script.js"></script>
<script src="https://vjs.zencdn.net/7.10.2/video.js"></script>
