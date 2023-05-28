
function onResponse(response){
    console.log('json ricevuto correttamente');
    return response.json();
}

function onJson(json){
    //conversione in stringa
    const json1 = JSON.parse(json);
    if(!json1){
        console.log("errore nella ricezione del file json!");
    }else {
        console.log(json1);

        const libreria = document.querySelector('#contenitore_gif');
        libreria.innerHTML= '';

        const risultati = json1.data
        for(result of risultati){
            console.log(result);

            const immagine = result.images.downsized_medium.url;
            const img = document.createElement('img');
            img.classList.add('gif1');
            img.src = immagine;

            libreria.appendChild(img);
        }
    }
}

function cerca_gif(event){
    event.preventDefault();

    const content = document.querySelector('#gif_anime').value;
    const text = encodeURIComponent(content);
    if(text === "dragonball" || text === "naruto" || text === "luffy" || text === "demon_slayer"){
        fetch('hmw.php?stampa='+text).then(onResponse).then(onJson);
        console.log(text);
    }else console.log("errore!");
}

fetch('hmw.php?stampa=zenitsu').then(onResponse).then(onJson);
fetch('index.php?stampa2=zenitsu').then(onResponse).then(onJson);
const cerca = document.querySelector('.gif');
cerca.addEventListener('submit',cerca_gif);