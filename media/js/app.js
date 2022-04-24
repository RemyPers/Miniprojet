let clv = document.querySelector("div#clavier");
let clvContent = document.createElement('div');
let motDePasse = document.querySelector("input#motDePasse");
let login = document.querySelector("input#identifiant");
let btnValider = document.querySelector("button#valider");
let btnEffacer = document.querySelector("button#effacer");
let divMsg = document.querySelector("div.authentification > p");


// ---------------------------- Génération du clavier aléatoire

clv.style.cssText = "display: flex;justify-content: center;margin: 2rem 0 2rem";
clvContent.style.cssText = "display: flex;width: 15rem;height: 15rem;flex-wrap: wrap;";
clv.appendChild(clvContent);


for (let i = 1; i <= 16; i++) {
    let touche = document.createElement('button');
    touche.setAttribute("class", "styleToucheNb");
    touche.textContent = "";
    clvContent.appendChild(touche);
}

let touches = document.querySelectorAll("button.styleToucheNb");


login.addEventListener('keydown', (e) => {
    console.log(e.key)

    if (e.key == 'Backspace') {
        if (login.value.length == 1) {
            login.setAttribute("class", "formInput"); 
        }
    }
    else {
        login.setAttribute("class", "formInputDone"); 
    }
})

clavierAleatoire()

btnEffacer.addEventListener('click', () => {
    clavierAleatoire()
    motDePasse.value = "";
    login.value = "";
    login.setAttribute("class", "formInput");
    divMsg.parentNode.style.display = "none";
})

function clavierAleatoire() {
    randomNbs = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
    randomNbs.sort(()=> Math.random() - 0.5);

    for (let i = 0; i <= 15; i++) {
        touches[i].textContent = randomNbs[i];
        if (touches[i].textContent >= 10) {
            touches[i].textContent = "";
            touches[i].style.cssText = "margin-right: 5px;height: 20%;width: 20%;border: 1px solid black;background-color: #DDDDDD;";
            //touches[i].setAttribute("class", "styleToucheVide");
        }
        else {
            //touches[i].setAttribute("class", "styleToucheNb");
            touches[i].style.cssText = "margin-right: 5px;height: 20%;width: 20%;background-color: #CCCCCC;";
        }
    }
}

for (let i = 0; i <= 15; i++) {
    touches[i].addEventListener('click', () => {
        motDePasse.value = motDePasse.value.concat(touches[i].textContent);
        console.log(motDePasse.value)
    })
}


//------------------------------------------------------ Requete Fetch

//btnValider.addEventListener('click', () => {
//    let fd = new FormData();
//fd.append("login", login.value)
//fd.append("password", motDePasse.value)

//let url = "https://www.ericfreelance.fr/api/check_user.php";
//
//var data = {
//    method: 'post',
//    body: fd
//}
//
//fetch(url, data)
//    .then(reponse => {
//        if (reponse.ok == false) {
//            throw Error(reponse.statusText);
//        }
//        return reponse.json();
//    })
//    .then(json => {
//        console.log(json.message)
//        divMsg.textContent = json.message;
//        divMsg.parentNode.style.display = 'flex';
//    })
//})












