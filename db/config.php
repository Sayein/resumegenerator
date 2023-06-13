<?php

$server="localhost";
$username="root";
$pass="";
$dbname="crbp";

$conn=mysqli_connect($server,$username,$pass,$dbname);

if(!$conn){
    die("Connection failed");
}

?>