<?php
function getlista() {
    include_once("./database.php");
    $database = new Database();
    $query = $database->connection->prepare("SELECT username,points FROM users ORDER BY points ASC");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);


    if (empty($result)){
        throw new Exception("No user found", 404);
        exit;
    }
    return $result;
}
?>