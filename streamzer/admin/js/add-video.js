/* Get anime selected and update season dropdown */
$(document).ready(function() {
    $("#dropdown_animes").change(function(){
        let anime_selected = $("#dropdown_animes ").find(":selected").text()
        
        $.ajax({
            type: "GET",
            url: "../util/read-seasons.php",
            data: "anime=" + anime_selected,
            success: function (response) {
                const seasons = JSON.parse(response)
                const htmlAdminSeasons = $('#dropdown_seasons')
                if(seasons.length > 0)
                    htmlAdminSeasons.prop("disabled", false)
                else
                    htmlAdminSeasons.prop("disabled", true)
                $(htmlAdminSeasons).empty()
                for(const season of seasons) {
                    $(htmlAdminSeasons).append(`<option>${season}</option>`)
                }
            }
        });
    })
})


function upload_videos() {
    var bar = $('#bar1')
    var percent = $('#percent1')
    var progress_div = $("#progress_div")
    $('#form-add-videos').ajaxForm({
        beforeSubmit: function() {
            document.getElementById("progress_div").style.display="block";
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },

        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        
        success: function() {
            var percentVal = '100%';
            bar.width(percentVal)
            percent.html(percentVal);
        },

        complete: function(xhr) {
            if(xhr.responseText)
            {
                $("<p class='mt-3 alert alert-success'>Votre contenu à été envoyé avec succès ✔</p>").insertAfter(progress_div)
            }
        }
    }); 
}