<?php

    $host = "localhost";
    $db = "AnimalPet";
    $user = "root";
    $password = "astronauta007";

  
    $conn =  new mysqli('localhost', 'root', '', 'AnimalPet');
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
