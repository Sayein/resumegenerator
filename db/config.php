<?php

$server="localhost";
$username="root";
$pass="";
$dbname="rgdb";

$conn=mysqli_connect($server,$username,$pass,$dbname);

if(!$conn){
    die("Connection failed");
}

?>