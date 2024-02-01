<?php
session_start();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/jpg" href="images/icon12.png" >
        
        
    </head>
    <body>
        <?php include './header.php'; ?>
        <main>
<?php
    
    $id = $_GET['pid'];
    include './dbinfo.php';
    $link = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
    $qry1 = "select * from productmaster where pid=$id";
    $qry2 = "select * from tv_specification where pid=$id";
    $result1 = mysqli_query($link, $qry1);
    $result2 = mysqli_query($link, $qry2);
    $row1 = mysqli_fetch_array($result1);
    $row2 = mysqli_fetch_array($result2);
    echo "<table style='marggin-left:50px; margin-top:20px'width='1000px'>";
    echo "<tr>";
    echo "<td><img src='$row1[4]'/></td>";
    echo "<td>";
    echo "<table>";
    echo "<tr><td><h3>$row1[1]</h3></td></tr>";
    echo "<tr><td>Price : $row1[2]</td></tr>";
    echo "<tr><td>Color : $row2[2]</td></tr>";
    echo "<tr><td>Launch Year : $row2[12]</td></tr>";
    echo "<tr><td><a class='btn'style='text-decoration:none' href='mycart.php?pid=$row1[0]&type=$row1[3]'>Add To Cart</a></td></tr>";
    echo "</table>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "<h1 style='margin-left:80px; margin-bottom=20px;'><b>Specification</b></h1>";
    echo "<table border='3px' style='text-align:left;border-collapse:collapse; padding:3px; margin-left:60px margin-bottom:30px' width='500px' height='400px' style='font-size:4px'>";
    echo "<tr><th>In The Box</th><td>$row2[1]</td></tr>";
    echo "<tr><th>Display Size</th><td>$row2[3]</td></tr>";
    echo "<tr><th>Color</th><td>$row2[2]</td></tr>";
    echo "<tr><th>Screen Type</th><td>$row2[4]</td></tr>";
    echo "<tr><th>HD Technology & Resolution</th><td>$row2[5]</td></tr>";
    echo "<tr><th>Smart TV</th><td>";
    if($row2[6]==0)
    {
        echo "No";
    }
    else
    {
        echo "Yes";
    }
    echo "</td></tr>";
    echo "<tr><th>Motion Senser</th><td>";
    if($row2[7]==0)
    {
        echo "No";
    }
    else
    {
        echo "Yes";
    }
    echo "</td></tr>";
    echo "<tr><th>HDMI Port</th><td>$row2[8]</td></tr>";
    echo "<tr><th>USB Port</th><td>$row2[9]</td></tr>";
    echo "<tr><th>Wifi</th><td>";
    if($row2[10]==0)
    {
        echo "No";
    }
    else
    {
        echo "Yes";
    }
    echo "</td></tr>";
    
    echo "<tr><th>Launch Year</th><td>$row2[11]</td></tr>";
    echo "<tr><th>Wall Mount included</th><td>";
    if($row2[12]==0)
    {
        echo "No";
    }
    else
    {
        echo "Yes";
    }
    echo "</td></tr>";
    
    echo "</table>";
?>              
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
