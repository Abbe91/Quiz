<?php include('./Login/server.php');
//If user is not logged in , they cannot access this page
if (empty($_SESSION['username'])) {
    header('location:Login/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/login.css">
    <script src="/js/logic.js"></script>
    <title>Quizz App</title>
</head>

<body onload="init()">

    <div id="container">
        <div class="content">
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success">
                    <h3><?php echo $_SESSION['success'];?></h3>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION['username'])) : ?>
                <p>Välkommen: <strong id="inloggedUserName"><?php echo $_SESSION['username']; ?></strong></p>
                <p><a class="logout" href="./index.php?logout='1'" style="color: white;">Logga ut</a></p>
            <?php endif ?>
        </div>
        <div class="panel">
            <h1>Quiz - Gissa siffran!</h1>
            Läs om spelreglerna: <button id="rulesBtn" onclick="rules()" class="">Quiz Guide</button>
          
        <section id="toplistaSec">
            <button onclick="toggleToplist()">Top Lista</button>
                <div id="topLista">
                   
                </div>
        </section>

            <p>Välja svårighetsinställning:</p>
            <button id="easyBtn" onclick="easyMode()" class="">Enkelt (10 försök)</button>
            <button id="hardBtn" onclick="hardMode()" class="">Svårt (5 försök)</button>
            <button id="newGameButton" onclick="newGame()">Börja om!!</button>
        </div>
        <div class="panel" id="botAnswer">
            <img src="./img/robot.gif" width="200px;" alt="robotGif" id="robotImg" style="border-radius: 25px;">
            <p>Jag tänker på ett nummer mellan 1 och 10... kan du gissa det?</p>
        </div>
        <h3 id="textOutput"></h3>
        <input type="number" id="inputBox" onchange="compareGuess()">
        <div id="panelCont">
            <div class="panel">
                <p>Antal tidigare försök: <br><span id="attempts"></span></p>
            </div>

            <div class="panel">
                <p>Dina tidigare gissningar: <br><span id="guessLog"></span></p>
            </div>

            <div class="panel">
                <p>Dina samlade poäng: <br><span id="points">0</span></p>
            </div>
        </div>
        <div>
            <p id="resultat">Är du redo? Kör!</p>
        </div>
    </div>
</body>

</html>