<?php

$host='localhost';
$user='root';
$pass='';
$conn=new mysqli($host,$user,$pass);
if($conn->error){
    die("connection failed".$conn->error);
}
$db_create="CREATE DATABASE IF NOT EXISTS login_form ";
if($conn->query($db_create)){
  echo"database is created";
}
else{
    echo"database is not created";
}

$conn=new mysqli($host,$user,$pass,'login_form');
if($conn->error){
  die("connection failed".$conn->error);
}



?>