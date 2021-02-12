/* Cache le lecteur vidéo et la liste déroulante des épisodes si il y'en a pas dans le répertoire en question */
$('#video').hide();
window.HELP_IMPROVE_VIDEOJS = false;



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
    let fullPathVideo = getParameter('directory')+ '/'+ video + '.mp4';
    fullPathVideo = fullPathVideo.replaceAll('+',' ').replaceAll('%2F', '/');

    var myPlayer = videojs('my-video');
    myPlayer.src({type: 'video/mp4', src: fullPathVideo});
    myPlayer.volume(0.3);

    $('#title').text(video);
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