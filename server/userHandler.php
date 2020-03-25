<?php 

function updateHighScore($points,$username) {
    include_once("./../server/database.php");
    try {
        $database = new Database();
        $query = $database->connection->prepare("UPDATE users SET points=:points WHERE username=:inloggedUserName");
        $status = $query->execute(array(
            "points" => $points,
            "inloggedUserName" => $username
        ));
    } catch(PDOException $err) {
        error_log($err);
    }

    if (!$status){
        throw new Exception("Could not update product", 500);
        exit;
    }
    return $status;
}


?>