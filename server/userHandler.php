<?php 

function updateHighScore($points) {
    include_once("./../server/database.php");
    try {
        $database = new Database();
        $query = $database->connection->prepare("UPDATE users SET points=:points");
        $status = $query->execute(array(
            "points" => $points,
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