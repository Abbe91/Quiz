var computerGuess;
var userGuessLog =[];
var attempts = 0;
var MaxGusses= 10;
var points = 9;

function makeRequest(url, method, formdata, callback) {
    fetch(url, {
        method: method,
        body: formdata
    }).then((data) => {
        return data.json()
    }).then((result) => {
        callback(result)
    }).catch((err) => {
        console.log("Error: ", err)
    })
}      

function rules() { 
    window.open('./rules.html', '_blank'); 
} 

function gameOver(){
    document.getElementById('newGameButton').style.display = 'inline';
    document.getElementById('easyBtn').style.display= 'none';
    document.getElementById('hardBtn').style.display = 'none';
    document.getElementById('inputBox').setAttribute('readonly', 'readonly');
    
    
}

function easyMode(){
    MaxGusses= 10;
    document.getElementById('easyBtn').className= 'activeButton';
    document.getElementById('hardBtn').className = '';
}

function hardMode(){
    MaxGusses = 5;
    document.getElementById('easyBtn').className= '';
    document.getElementById('hardBtn').className = 'activeButton';
}

function newGame(){
    window.location.reload()
}

function init(){
    computerGuess = Math.floor(Math.random() * 10 + 1);
   console.log(computerGuess)
   document.getElementById('newGameButton').style.display = 'none';
}



function compareGuess(){
    
    var pointsBox = document.getElementById('points');
    var userGuess =" " + document.getElementById('inputBox').value;
    console.log(userGuess);
    userGuessLog.push(userGuess);
    document.getElementById('guessLog').innerHTML= userGuessLog;
    attempts++;
    document.getElementById('attempts').innerHTML = attempts;

    if(userGuessLog.length < MaxGusses){
        if(userGuess > computerGuess){
            document.getElementById('textOutput').innerHTML =" Siffran är för högt!";
            document.getElementById('inputBox').value="";
            document.getElementById('resultat').innerHTML ="Fel! Prova igen!";
            
            pointsBox.innerHTML = points;
            points--;    

         
        } else if(userGuess < computerGuess){
            document.getElementById('textOutput').innerHTML =" Siffran är för lågt!";
            document.getElementById('inputBox').value="";
            document.getElementById('resultat').innerHTML ="Fel! Prova igen!";

            pointsBox.innerHTML = points;
            points--;
         
   
        } else {
            document.getElementById('textOutput').innerHTML ="Ditt svar är rätt!";
            document.getElementById('resultat').innerHTML ="Rätt! Grattis, du vann i " + attempts+ ' försök och samlade ' + points + ' pöang';
            document.getElementById('container').style.backgroundColor = 'green';
            document.getElementById('points').innerHTML = points;
            gameOver(); 

            var inloggedUserName = document.getElementById("inloggedUserName").textContent;

            var data = new FormData();

            data.append("action", "updateScore");
            data.append("points", points);
            data.append("inloggedUserName", inloggedUserName);

        }
    } else {
        if(userGuess > computerGuess ){
            document.getElementById('textOutput').innerHTML ="Game over! " + " Det rätta svaret var "+ computerGuess;
            document.getElementById('container').style.backgroundColor = 'red';
            gameOver();
            document.getElementById('points').innerHTML = 0;
           
        }else if (userGuess < computerGuess){
            document.getElementById('textOutput').innerHTML ="Game over!" + " Det rätta svaret var "+ computerGuess;
            document.getElementById('container').style.backgroundColor = 'red';
            gameOver();
            document.getElementById('points').innerHTML = 0;
        
        }else {
            document.getElementById('textOutput').innerHTML ="GRATTIS! Ditt svar " + computerGuess + " är korrekt!";
            document.getElementById('container').style.backgroundColor = 'green';
            gameOver();
            document.getElementById('points').innerHTML = points;
        }
    }

    makeRequest('../server/userReciever.php', "POST", data, (result) => {
        
        console.log(result);
    })
}

function toggleToplist() {
    var topListan = document.getElementById('topLista');
    if (topListan.style.display === "none") {
        topListan.style.display = "block";
        showPints();
      } else {
        topListan.style.display = "none";
      }
    }


function showPints() {
    makeRequest("../server/listaReciever.php?action=getlista", "GET", null, (result) => {
        
        var topListan = document.getElementById('topLista');
      
         for (let i = 0; i < result.length; i++) {
             var username = (result[i].username)
             var points = (result[i].points)
             var row = document.createElement('div');

             var pUserName = document.createElement('p');
             var pPoints = document.createElement('p');

             pUserName.className = "userLista"
             pPoints.className = "pointsLista"
             pUserName.innerText = username;
             pPoints.innerText = points;
             row.appendChild(pUserName);
             row.appendChild(pPoints);
             topListan.appendChild(row);
           

         }

    })
}
showPints()

function showTheListaOnAnotherSite(){
    
}