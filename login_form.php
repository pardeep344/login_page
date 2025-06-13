<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>
<body>
    <?php
    session_start();
    
    if(isset($_SESSION['success'])){
        echo"<p style='color:green; text-align:center;'>".$_SESSION['success']."</p>";
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
        echo"<p style='color:green;'>".$_SESSION['error']."</p>";
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['errors'])){
        foreach($_SESSION['errors'] as $err){
            echo"<p style='color:green;'>".$err."</p>";
        }
        unset($_SESSION['errors']);
    }
    
    ?>
   
     <div class="section d-flex vh-100 justify-content-center align-items-center bg-info">
        <form action="login_script.php" method="post" class="bg-white bg-opacity-75 border rounded shadow p-4">
            <div class="row">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="row">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" id="password" class="form-control">
        </div>
        <div class="row my-3">
            <a href="registration_page.php" class="text-center text-decoration-none">have not account</a>
        </div>
        <div class="row">
            <button class="btn btn-primary" type="submit">Log In</button>
        </div>
        </form>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>