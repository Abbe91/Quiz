<?php
session_start();
// Create connection
$db = mysqli_connect("localhost", "root", "root", "database_quiz");
$username = "";
$email = "";
$errors = array();
//If register button is clicked
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    //Ensure that form fields are filled properly
    if (empty($username)) {
        array_push($errors, "Användarnman krävs");
    }
    if (empty($email)) {
        array_push($errors, "En mejladress krävs");
    }
    if (empty($password_1)) {
        array_push($errors, "Ett lösenord krävs");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "Lösenord matchar inte!");
    }
    //If there are no errors , save user to database
    if (count($errors) == 0) {
        $password = md5($password_1); //Encrypt password before storing in database for security
        $sql = "INSERT INTO users (username,email,password)
     VALUES('$username','$email','$password')";
        mysqli_query($db, $sql);


        $_SESSION['username'] = $username;

        $_SESSION['success'] = "Du är inloggad."; //"You are now logged in.";

        header('location:../index.php'); //redirect to home page
    }
}

//Log user in from login page
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    //Ensure that form fields are filled properly
    if (empty($username)) {

        array_push($errors, "Användarnamn krävs"); //"Username is required"
    }
    if (empty($password)) {
        array_push($errors, "Lösenord krävs"); //"Password is required"

    }

    if (count($errors) ==0) {
        $password = md5($password); //Encrypt password before comparing with that from database
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
            //log user in
            $_SESSION['username'] = $username;

            $_SESSION['success'] = "Du är inloggad."; //"You are now logged in.";
            header('location:../index.php'); //redirect to home page        
        } else {
            array_push($errors, "Fel användarnamn och/eller lösenord"); //"Wrong username/password combination");


        }
    }
}

//Logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location:Login/login.php'); //redirect to home page
}
