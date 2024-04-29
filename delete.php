<?php
include "db_conn.php";
$id=$_GET['id'];
$sql="DELETE FROM `crud` WHERE id=$id";
$resulet=mysqli_query($conn,$sql);
if($resulet){
    header("Location:index.php?msg=Record deleted Successfully");
}
else 
{
    echo"Faild: ".mysqli_error($conn);
}
?>