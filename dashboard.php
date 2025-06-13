<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    session_start();
    if(isset($_SESSION['success'])){
        echo"<p style='color:green;'>".$_SESSION['success']."</p>";
        unset($_SESSION['success']);
    }
    
    ?>

   
    <a href="logout_script.php" class="btn btn-primary">Log Out</a>
</body>
</html>