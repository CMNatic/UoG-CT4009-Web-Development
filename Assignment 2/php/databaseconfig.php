<?php

$servername="localhost";
$username="root";
$password="pass"; //change this
$dbname="glostit";

    /* variable containing the used mysqli credentials for error checking*/
    $connection = new mysqli($servername, $username, $password, $dbname);
    
    //* If connection failed e.g. wrong credentials or wrong servername, output it to the webpage where this file is called */
    if ($connection->connect_error) {
        echo $connection->connect_error;
    }
?>