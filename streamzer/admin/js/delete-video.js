import './read-episodes.js'
import { readEpisodes } from './read-episodes.js'


var anime_selected
const htmlAdminSeasons = $('#dropdown_seasons')
/* Get anime selected and update season checkbox */
$(document).ready(function() {
    $("#dropdown_animes").change(function(){
        anime_selected = $("#dropdown_animes ").find(":selected").text()
        $.ajax({
            type: "GET",
            url: "../util/read-seasons.php",
            data: "anime=" + anime_selected,
            success: function (response) {
                const seasons = JSON.parse(response)
                if(seasons.length > 0)
                    htmlAdminSeasons.prop("disabled", false)
                else
                    htmlAdminSeasons.prop("disabled", true)
                $(htmlAdminSeasons).empty()
                $(htmlAdminSeasons).trigger("change")

            }
        })
    })

    $(htmlAdminSeasons).change(function() {
        let season_selected = htmlAdminSeasons.find(":selected").text()
        console.log(season_selected)
        $(`[data-admin-episodes]`).empty()
        readEpisodes(anime_selected, season_selected)
        .then((response) => {
            $(`[data-admin-episodes]`).append(response)
        })
        .catch(error => {
            console.log(error)
        })
    })

})

  