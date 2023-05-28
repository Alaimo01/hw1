function onResponse(response){
    if(response.ok){
        console.log('il commento è stato salvato correttamente!');
        return response.json();
    }else{
        console.log('errore durante il salvataggio del commento!');
    }
}

function cambia_immagine(event){
    
    const cambia = event.currentTarget;
    cambia.classList.add('selected');
    if(cambia.classList.contains('selected')){
        cambia.src = "img/cuore_vuoto.png";
        cambia.classList.remove('selected');
        togli_preferiti(event);
    }
    event.preventDefault();
    
}

function onResponserimozione(response){
    if(response){
        console.log('il commento è stato rimosso correttamente tra i preferiti!');
        return response.json();
    }else{
        console.log('errore durante la rimozione tra i preferiti del commento!');
    }
}

function onjsontoglipreferiti(json){
    console.log(json);
    if (json) {
        console.log('Il commento è stato tolto tra i preferiti correttamente!');
    } else {
        console.log('Errore durante la rimozione tra i preferiti del commento!');
    };
}

function togli_preferiti(event){
    
    const id = event.currentTarget.parentNode.querySelector('.preferiti').id;
    fetch('preferiti.php?id='+id).then(onResponserimozione).then(onjsontoglipreferiti);
    fetch('preferiti.php?stampa=ciao').then(onResponse).then(onjson);
    console.log(id);
}

async function onjson(json){
    if(!json){
        console.log('errore durante la richiesta fetch');
    }
    else if(json){
       console.log(json);
       const contenitore1=document.querySelector('.corpo2');
       contenitore1.innerHTML= '';

       for(let i = 0 ; i < json.length ; i++){
        const ut = json[i].utente;
        const comm = json[i].commento;
        const dat = json[i].data;
        const id_cmt=json[i].id_commento;
        const immagine = document.createElement('img');
        immagine.classList.add('preferiti');
        immagine.src = "img/cuore_pieno.png";
        immagine.setAttribute("id",id_cmt);
        immagine.addEventListener('click',cambia_immagine);

        const contenitore = document.createElement('div');
        contenitore.classList.add('commento');
        const utente = document.createElement('h2');
        utente.textContent = ut;
        
        const commento = document.createElement('h2');
        commento.classList.add('comm_utente');
        commento.textContent=comm;

        const data = document.createElement('h2');
        data.textContent=dat;

        contenitore.appendChild(immagine);
        contenitore.appendChild(utente);
        contenitore.appendChild(commento);
        contenitore.appendChild(data);
        contenitore1.appendChild(contenitore);
       }
    }
}

fetch('preferiti.php?stampa=ciao').then(onResponse).then(onjson);