<?php
include 'conn.php';
$user_table="CREATE TABLE IF NOT EXISTS user_info(
                
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_name VARCHAR(100) NOT NULL,
                last_name VARCHAR(100) NOT NULL,
                email VARCHAR(300) NOT NULL,
                age VARCHAR(100) NOT NULL,
                password VARCHAR(100) NOT NULL,
                city VARCHAR(100) NOT NULL,
                gender VARCHAR(100) NOT NULL,
                skills VARCHAR(100) NOT NULL,
                user_image VARCHAR(200) NOT NULL,
                user_cv VARCHAR(200) NOT NULL

                )";

   if($conn->query($user_table )){
    echo "user table created";
   }  
   else{
    echo "user table not created".$conn->error;
   }   
  
    
         


?>