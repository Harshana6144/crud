<?php
include "db_conn.php";

if(isset($_POST['submit'])) {
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email =$_POST['email'];
    $gender=$_POST['Gender'];

    $sql= "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `Gender`)
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
    <?php
    if(isset($_GET['msg'])){
        $msg=$_GET['msg'];
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
    <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "db_conn.php";
        $sql="SELECT * FROM `crud`";
        $result=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <th><?php echo $row['id']?></th>
                    <th><?php echo $row['first_name']?></th>
                    <th><?php echo $row['last_name']?></th>
                    <th><?php echo $row['Email']?></th>
                    <th><?php echo $row['Gender']?></th>
                    
                <td>
                     <a href="edit.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                     <a href="delete.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                </td>
            </tr>
            <?php
        }

    ?>
</tbody>
</table>
</div>
      


<!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

    
</body>
</html>