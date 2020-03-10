function rules() { 
    window.open('/rules.html', '_blank'); 
} 

function gameOver(){
    document.getElementById('newGameButton').style.display = 'inline';
}
function init(){
    computerGuess = Math.floor(Math.random() * 10 + 1);
   console.log(computerGuess)
   document.getElementById('newGameButton').style.display = 'none';
}


let guessList = [];

function showGuess() {
    let showInputGuessInput = guessList.push(document.getElementById("showInputGuess").value);
    let showGuessInDisplay = document.getElementById("showGuessInDisplay").innerHTML = guessList;

    let tryCount = document.getElementById("tryCount").innerHTML = guessList.length;
    
    if(guessList.length == 11){
        Swal.fire({
            icon: 'error',
            title: 'STOP...',
            text: 'Max 10 försök!',
        });
    }

    if(showInputGuessInput){
        document.getElementById("showInputGuess").value = "";

    }

    if(guessList == ""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ange siffra!',
        });
    }
    

    console.log(showInputGuessInput);
    console.log(showGuessInDisplay);   
}



