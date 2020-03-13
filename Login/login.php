<?php include ('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">
    <script src="/js/logic.js"></script>
    <title>Quizz App</title>
</head>

<body onload="init()">
    <div id="container">
        <div class="panel">
            <h1>Quiz - Gissa siffran!</h1>
            Läs om spelreglerna: <button id="rulesBtn" onclick="rules()" class="">Quiz Guide</button>
        </div>

        <div class="register">
            <h2>Login</h2>
            <form method="POST" action="login.php">
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username">
                </div>
                
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password_1">
                </div>
                
                <div class="input-group">
                    <button type="submit" name="login" class="btn">Register</button>
                </div>
                <p>

                    Not yet a member? <a href="register.php">Sign up</a>

                </p>
            </form>


        </div>


    </div>
</body>

</html>