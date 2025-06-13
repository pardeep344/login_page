<?php
session_start();
include 'conn.php';

$errors=[];
$success='';
 

if($_SERVER["REQUEST_METHOD"]==="POST"){


    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
    }
    else{
        $errors[]="please write email";
    }

    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
        }
    else{
        $errors[]="please write password";
        }

            if(empty($errors)){
                $sql=$conn->prepare("SELECT password FROM user_info WHERE email = ?");
                $sql->bind_param("s",$email);
                $sql->execute();
                $result=$sql->get_result();

                if($result->num_rows === 1){
                    $row = $result->fetch_assoc();
                    $hashed_password = $row['password'];

                    if(password_verify($password, $hashed_password)){
                        $_SESSION['success'] = "login successful";
                        $_SESSION['email'] = $email;
                        header('location: dashboard.php');
                        exit;
                    }
                    else{
                        $errors[]="incorrect password";
                    }
                }else{
                    $errors[]="incorrect email";
                }

            }
            else{
                $_SESSION['errors']="make sure all format are correct";
            }
            if(!empty($errors)){
                $_SESSION['errors']=$errors;
                header("location: login_form.php");
            }
            }




?>