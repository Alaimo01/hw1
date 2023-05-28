function cambia_immagine(event){
    event.preventDefault();
    const cambia = event.currentTarget;
    if(cambia.classList.contains('selected')){
        cambia.src = "img/cuore_vuoto.png";
        cambia.classList.remove('selected');
        togli_preferiti(event);
    }else {
        cambia.src = "img/cuore_pieno.png";
        cambia.classList.add('selected');
        metti_preferiti(event);

    }
}


//funzione utilizzata per avere come valore di ritorno un "booleano"
function onjsonelimina(json){

    console.log(json);
    if(!json){
        console.log('errore durante la richiesta fetch');
    }else if(json){
       if(json.exists === true){
        return true;
       }
       else false;
    }
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
        immagine.src = "img/cuore_vuoto.png";
        immagine.setAttribute("id",id_cmt);
        immagine.addEventListener('click',cambia_immagine);

        const contenitore = document.createElement('div');
        contenitore.classList.add('commento');
        const utente = document.createElement('h2');
        utente.classList.add('utente');
        utente.textContent ="Utente: "+ ut;
        
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

        
            
               const datas = await fetch('onepiece.php?utente='+json[i].utente).then(onResponse).then(onjsonelimina);

               console.log(datas);
               if(datas === true){
                const cont = document.querySelector('.commento');
                const elimina = document.createElement('button');
                elimina.classList.add('elimina');
                const text = document.createElement('h2');
                text.textContent = "elimina";
                elimina.appendChild(text);
                contenitore.appendChild(elimina);

                elimina.addEventListener('click',cancella_commento);

               }

       }

       for(let j = 0; j<json.length; j++){   
        fetch('onepiece.php?id2='+ json[j].id_commento).then(onResponse).then(onjsonpreferiti1);
        console.log("sto passando ->" +json[j].id_commento);
       }

       
    }
}

function onjsonpreferiti1(json){
    if(json.length > 0){
        console.log(json);
    }
}



function onjsonpreferiti(json){
    console.log(json);
    if (json ) {
        console.log('Il commento è stato inserito tra i preferiti correttamente!');
    } else {
        console.log('Errore durante l\'inserimento tra i preferiti del commento!');
    };
}



function onjsontoglipreferiti(json){
    console.log(json);
    if (json) {
        console.log('Il commento è stato tolto tra i preferiti correttamente!');
    } else {
        console.log('Errore durante la rimozione tra i preferiti del commento!');
    };
}



function onResponse(response){
    if(response.ok){
        console.log('il commento è stato salvato correttamente!');
        return response.json();
    }else{
        console.log('errore durante il salvataggio del commento!');
    }
}



function onResponsepreferiti(response){
    if(response.ok){
        console.log('il commento è stato salvato correttamente tra i preferiti!');
        return response.json();
    }else{
        console.log('errore durante il salvataggio tra i preferiti del commento!');
    }
}



function onResponserimozione(response){
    if(response.ok){
        console.log('il commento è stato rimosso correttamente tra i preferiti!');
        return response.json();
    }else{
        console.log('errore durante la rimozione tra i preferiti del commento!');
    }
}



function cancella_commento(event){
    event.preventDefault();
    const comm = event.currentTarget.parentNode.querySelector('h2.comm_utente');
    const comm1 = comm.textContent;
    fetch('onepiece.php?cancella1=' + encodeURIComponent(comm1)+'&chat=onepiece').then(onResponse).then(onjsonelimina);
    console.log(comm1);
    // Rimuovi il commento dal DOM
    comm.parentNode.remove();
}



function invia_testo(event){

    event.preventDefault();
    //otteniamo un riferimento all'area test e al pulsante di invio
    const comm = document.querySelector('#area_testo');
    fetch('onepiece.php?commento='+encodeURIComponent(comm.value)+'&chat=onepiece').then(onResponse).then(onjson);
    console.log(comm.value);
}



function metti_preferiti(event){
    
    const comm = event.currentTarget.parentNode.querySelector('h2.comm_utente');
    const comm1 = comm.textContent;
    const ut =  event.currentTarget.parentNode.querySelector('h2.utente');
    const utente = ut.textContent;
    const id = event.currentTarget.parentNode.querySelector('.preferiti').id;
    fetch('onepiece.php?preferiti=' + encodeURIComponent(comm1)+'&chat=onepiece & utente='+ encodeURIComponent(utente)+'&id='+id).then(onResponsepreferiti).then(onjsonpreferiti);
    console.log(comm1);
    console.log(utente);
    console.log(id);
}



function togli_preferiti(event){
    
    const id = event.currentTarget.parentNode.querySelector('.preferiti').id;
    fetch('onepiece.php?togli_id='+id).then(onResponserimozione).then(onjsontoglipreferiti);
    console.log(id);
}

fetch('onepiece.php?stampa=ciao').then(onResponse).then(onjson);

const invio = document.querySelector('button.invia');
invio.addEventListener('click',invia_testo);