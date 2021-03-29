/* Cache le lecteur vidéo et la liste déroulante des épisodes si il y'en a pas dans le répertoire en question */
$('#div-video').hide()
window.HELP_IMPROVE_VIDEOJS = false

if ($('#videos').children().length == 0){
    $('#dropdownMenuLink').hide()
}

/* EVENT JAVASCRIPT */
$('#previous,#next, #videos a').on('click', function (e) {
    e.preventDefault()
    console.log(e)
    const video = $(e.target).attr('data-value')
    loadVideo(video)
})



/* Charge une vidéo à l'aide de son chemin passé en paramètre */
function loadVideo(video) {
    let fullPathVideo = getParameter('directory')+ '/'+ video + '.mp4'
    fullPathVideo = fullPathVideo.replaceAll('+',' ').replaceAll('%2F', '/')

    let myPlayer = $('#my-video')
    myPlayer.attr("src",fullPathVideo)

    $('#title').text(video)
    $('#div-video').show()
    $('[data-content-picture]').hide()

    configureNextAndPreviousVideo(video)
}


function configureNextAndPreviousVideo(currentVideo) {
    const videos = getAllVideos()
    currentVideoIndex = videos.indexOf(currentVideo)
    if(videos[currentVideoIndex - 1]) {
        $('#previous').attr('data-value', videos[currentVideoIndex - 1])
        $('#previous').attr('disabled', false)
    }else{
        $('#previous').attr('disabled', true)
    }
    if(videos[currentVideoIndex + 1]) {
        $('#next').attr('data-value', videos[currentVideoIndex + 1])
        $('#next').attr('disabled', false)
    }else {
        $('#next').attr('disabled', true)
    }
}

function getAllVideos() {
    let videos = []
    $('.dropdown-item').each(function() { videos.push($(this).text()) })

    return videos
}

/* Récupère un paramètre GET à travers son nom (exemple: http://localhost/streaming/index.php?directory=animes   =>  si je passe 'directory' je récupère 'animes') */
function getParameter(param) {
	var vars = {}
	window.location.href.replace( location.hash, '' ).replace( /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : ''
		}
	)

	if ( param ) {
		return vars[param] ? vars[param] : null	
	}
	return vars
}