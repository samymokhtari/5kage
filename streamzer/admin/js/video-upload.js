function showVideoUploaded(filename, filesize){
    console.log("ok")
    document.getElementById('file-uploaded').appendChild(`<li>Fichier: ${filename} =>  ${filesize} OK</li>`);
}