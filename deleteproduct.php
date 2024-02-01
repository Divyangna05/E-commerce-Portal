<?php
$id=$_GET['productid'];
include'./dbinfo.php';
$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
mysqli_query($con,"delete from productmaster where pid=$id");
mysqli_close($con);
header("location:viewallproduct.php");
?>