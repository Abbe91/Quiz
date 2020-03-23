<?php
try{
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["action"] == "updateScore") { 
            include_once("./userHandler.php"); 
              echo json_encode(updateHighScore(
                $_POST["points"],
            ));
            exit;
        }else{
                throw new Exception("Not a valid endpont", 501);
        };
    } } catch(Exception $e) {
        echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
    }
  

?>