<?php

    $host = "localhost";
    $db = "ADOTAPETDB";
    $user = "root";
    $password = ";

  
    $conn =  new mysqli('localhost', 'root', '', 'ADOTAPETDB');
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
