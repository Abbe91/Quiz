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