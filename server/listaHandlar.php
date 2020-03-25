<?php
function getlista() {
    include_once("./database.php");
    $database = new Database();
    $query = $database->connection->prepare("SELECT username,points FROM users WHERE points != 0 ORDER BY points DESC LIMIT 5");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);


    if (empty($result)){
        throw new Exception("No user found", 404);
        exit;
    }
    return $result;
}
?>