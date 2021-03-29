
export function readEpisodes (p_anime, p_season) {
    let data = {
        anime: p_anime,
        season: p_season
    }
    return new Promise(function(resolve, reject) {
        let result;
        $.ajax({
            type: "GET",
            url: "../util/read-episodes.php",
            data: data,
            success: function (response) {
                const episodes = JSON.parse(response)
                const nameCheckboxAll = p_season.toLowerCase().replace(/ /g,'_')
                console.log(nameCheckboxAll)
                result = `  
                    <div>
                        <input onchange='onChangeAllSelection()' type="checkbox" id="all_episodes" name="all_episodes">
                        <label for="all_episodes">Sélectionner tout</label>
                    </div>`
                for(let index = 0; index < episodes.length; index++) {
                    result += `
                    <div>
                        <input type="checkbox" id="${episodes[index]}" name="${episodes[index]}">
                        <label for="scales">${episodes[index]}</label>
                    </div>`
                }
                resolve(result)
            }
        })
    })
}