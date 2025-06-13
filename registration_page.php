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
    echo"<p style='colore:green;'>".$_SESSION['success']."</p>";
    unset($_SESSION['success']);
  }
  if(isset($_SESSION['error'])){
    echo"<p style='color:red';>".$_session['error']."</p>";
    unset($_SESSION['error']);
  }
  if(isset($_SESSION['errors'])){
    foreach($_SESSION['errors'] as $err){
        echo"<p style='color:red';>".$err."</p>";
    }
    unset($_SESSION['errors']);
  }
  
  ?>


<div class="section py-5 d-flex justify-content-center">
<form action="store.php" method="post" enctype="multipart/form-data">
   <div class="row mb-3">
    <label for="user_name">Name</label>
    <input type="text" class="form-control" name="user_name" id="user-name">
   </div> 
    <div class="row mb-3">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" name="last_name" id="last_name">
   </div> 
    <div class="row mb-3">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" id="email">
   </div> 
    <div class="row mb-3">
    <label for="age">Age</label>
    <input type="text" class="form-control" name="age" id="age">
   </div> 
   <div class="row mb-3">
    <label for="password">Create Password</label>
    <input type="text" class="form-control" name="password" id="password">
   </div> 
   <div class="row mb-3">
    <label for="confirm_password">Confirm Password</label>
    <input type="text" class="form-control" name="confirm_password" id="confirm_password">
   </div> 
   <div class="row">
    <div class="col">
        <P>Selct place</P>
        <div class="dropdown" id="dropdown">
            <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="dropdownBtn">Select City</button>
            <ul class="dropdown-menu">
                <li><a href="#" class="dropdown-item" onclick="setcity('jalandhar')">Jalandhar</a></li>
                <li><a href="#" class="dropdown-item" onclick="setcity('mumbai')">Mumbai</a></li>
                <li><a href="#" class="dropdown-item" onclick="setcity('delhi')">Delhi</a></li>

            </ul>
             </div>
            <input type="hidden" name="city" id="cityname">
    </div>
    <div class="col form-check-inline">
        
            <input type="radio" name="gender" id="male" value="male" class="form-check-input">
            <label for="male">Male</label>

            <input type="radio" name="gender" id="female" value="female" class="form-check-input">
            <label for="female">Female</label>

            <input type="radio" name="gender" id="other" value="other" class="form-check-input">
            <label for="other">Other</label>     
    </div>
   </div>
   <div class="d-flex flex-wrap gap-3 mt-3">
    <div class="form-check form-check-inline">
    <input type="checkbox" name="skills[]" id="php" class="form-check-input" value="php">
    <label for="php" class="form-check-label">Php</label>
    </div>
   <div class="form-check form-check-inline">
    <input type="checkbox" name="skills[]" id="java_script" class="form-check-input" value="js">
    <label for="java_script" class="form-check-label">Java Script</label>
   </div>
   <div class="form-check form-check-inline">
    <input type="checkbox" name="skills[]" id="html" class="form-check-input" value="html">
    <label for="html" class="form-check-label">Html</label>
   </div>
    <div class="form-check form-check-inline">
    <input type="checkbox" name="skills[]" id="css" class="form-check-input" value="css">
    <label for="css" class="form-check-label">Css</label>
    </div>
   <div class="form-check form-check-inline">
    <input type="checkbox" name="skills[]" id="Bootstrap" class="form-check-input" value="bootstrap">
    <label for="bootstrap" class="form-check-label">Bootstrap</label>
   </div>
   </div>
   <div class="row mt-3">
   <div class="col">
    <label for="user_image" class="form-label">Image</label>
    <input type="file" name="user_image" id="user_image" class="form-control">
   </div>

    <div class="col">    
    <label for="user_cv" class="form-label">Select Cv</label>
    <input type="file" name="user_cv" id="user_cv" class="form-control">
    </div>
    </div>
   <div class="row mt-3">
    <button class="btn btn-primary" type="submit">Submit</button>
   </div>
</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
<script>
    function setcity(city){
        document.getElementById("dropdownBtn").innerText=city;
        document.getElementById("cityname").value=city;
    }
</script>
</body>
</html>