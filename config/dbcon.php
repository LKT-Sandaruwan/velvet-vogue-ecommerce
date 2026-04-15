<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "velvet_vogue";

// creating db connection
$con = mysqli_connect($host, $username, $password, $database);

// check db connection
if(!$con)
{
   die("Connection Faild: ". mysqli_connect_error());
}

?>