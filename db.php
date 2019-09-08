<?php
    $servername = "localhost";
    $username = "root";
    $password = "Mohammed.123.";
    $database = "student";
try{
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
}catch(PDOException $e){

}



?>