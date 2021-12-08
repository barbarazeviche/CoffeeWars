// DEPART
const heuresStart = 0;
const minutesStart = 3;
const secondesStart = 0;

// VARIABLES
let heures;
let minutes;
let secondes;
let strHeure;
let strMinutes;
let strSecondes;

// EMPLACEMENT DOM
let placeTimer = document.getElementById("timer");

// ? TIMER
// ? INITIALISATION PARTIE
function InitialisationJeu(){
    // INITIALISATION TIMER
    heures = heuresStart;
    minutes = minutesStart;
    secondes = secondesStart;
    if(heures<10){        
        if(heures<0){
            strHeure='00';
        }else{
        strHeure='0'+ heures;
        }
    }
    if(minutes<10){
        strMinutes=`0${minutes}`;
    }
    else{
        strMinutes= `${minutes}`;
    }
    strSecondes=`${secondes}`;
    if(secondes<10){        
        if(secondes<0){
            strSecondes='00';
        }else{
        strSecondes='0'+ secondes;
        }
    }
    placeTimer.innerHTML = `${strHeure}:${strMinutes}:${strSecondes}`;
}

function timer()
{
    // Calcul
    if(secondes==-1) {
    minutes-=1;
    secondes=59;
    }else{
    secondes-=1;
    }

    //Affichage
    strHeure = heures<10?`0${heures}`:heures;
    strMinutes;    
    if(minutes<10){
        strMinutes=`0${minutes}`;
    }
    else{
        strMinutes= `${minutes}`;
    }

    strSecondes=`${secondes}`;
    if(secondes<10){        
        if(secondes<0){
            strSecondes='00';
        }else{
        strSecondes='0'+ secondes;
        }
    }

    //Affichage Timer
    placeTimer.innerHTML = `${strHeure}:${strMinutes}:${strSecondes}`;

    //Fin du Timer
    if(heures==0 && minutes==0 && secondes==-1){
        document.getElementById("timer").setAttribute('class','texteRouge');
        finPartie();
    }
}

// ? FIN PARTIE         
function finPartie() {
    //empêcher l'encodage
    // document.getElementById("codeJoueur").setAttribute('disabled','');
    //empêcher l'appuyage du bouton submit
    // document.getElementById("submit").setAttribute("disabled","");

    //Arrêter Timer
    clearInterval(myVar);

    // document.getElementById('Replay').removeAttribute('hidden');
}

InitialisationJeu(); 
