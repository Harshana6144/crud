<?php
include "db_conn.php";

if(isset($_POST['submit'])) {
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email =$_POST['email'];
    $gender=$_POST['gender'];

    $sql= "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `Email`, `Gender`)
     VALUES (NULL,'$first_name','$last_name','$email','$gender') ";

     $result=mysqli_query($conn,$sql);

     if($result){
        header("Location: index.php?msg=New record created successfully");
     }
     else{
        echo "Faild :". mysqli_error($conn);
     }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!--font Awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Application</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5 " style="background-color:#00ff5573">
        PHP Complete CRUD Application
</nav>

<div class="container">
        <div class="text-center mb-4">
            <h3>Add a new User</h3>
            <p class="text-muted">Complete the from below to add a new user</p>
        </div>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;" >
            <div class="row mb-3">
                <div class="col">
                    <div class="form-label">First Name</div>
                    <input type="text" class="form-control" name="first_name" 
                    placeholder="Harshana" required>
                </div>

                <div class="col">
                    <label class="form-label">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" placeholder="prasd" required>
                </div>
            </div>

            <div class="mb-3">
            <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email"
                    placeholder="harshana@gmail.com">
            </div>

            <div class="mb-3">
                <div class="form-group">
                    <label>Gender:</label>
                    
                    <label for="male" class="form-input-label">Male</label>
                    <input type="radio" class="form-check-input" name="gender" id="male" value="Male">

                    
                    <label for="female" class="form-input-label">Female</label>
                    <input type="radio" class="form-check-input" name="gender" id="female" value="Female">
                    
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">save</button>
                <a href="index.php" class="btn btn-danger">Cancal</a>

            </div>
        </from>
    </div>
</div>
      


<!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

    
</body>
</html>