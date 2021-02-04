/* Cache le lecteur vidéo et la liste déroulante des épisodes si il y'en a pas dans le répertoire en question */
$('#video').hide();

if ($('#videos').children().length == 0){
    $('#dropdownMenuLink').hide();
}

$('#videos a').on('click', function (e) {
    e.preventDefault()
    const video = $(e.target).text();
    loadVideo(video)
})

/* Charge une vidéo à l'aide de son chemin passé en paramètre */
function loadVideo(video) {
    var myVideo = document.getElementById('videoPlayer');

    if (myVideo.canPlayType('video/mp4')) {
        var fullPathVideo = getParameter('directory')+ '/'+ video + '.mp4';
        fullPathVideo = fullPathVideo.replaceAll('+',' ').replaceAll('%2F', '/');
        console.log(fullPathVideo);
        myVideo.setAttribute('src', fullPathVideo);
    }else{
        var message = document.createElement('p');
        message.textContent("Impossible de lire la vidéo 😔");
    }

    myVideo.width = 1280;
    myVideo.height = 720;
    var title = document.getElementById('title');
    title.textContent = video;
    $('#video').show();
}

/* Récupère un paramètre GET à travers son nom (exemple: http://localhost/streaming/index.php?directory=animes   =>  si je passe 'directory' je récupère 'animes') */
function getParameter(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}