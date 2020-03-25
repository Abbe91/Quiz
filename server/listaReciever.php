<?php
try {
        if($_SERVER["REQUEST_METHOD"] == "GET") {

            if($_GET["action"] == "getlista") { 
                include_once("./listaHandlar.php");              
                echo json_encode(getlista());
                
                exit;
            }  
        } 
      

} catch(Exception $e) {

    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}
?>