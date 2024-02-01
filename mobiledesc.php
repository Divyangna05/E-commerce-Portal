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
    $qry2 = "select * from mobilespecification where pid=$id";
    $result1 = mysqli_query($link, $qry1);
    $result2 = mysqli_query($link, $qry2);
    $row1 = mysqli_fetch_array($result1);
    $row2 = mysqli_fetch_array($result2);
    echo "<table style='margin-top:20px'width='800px'>";
    echo "<tr>";
    echo "<td><img src='$row1[4]'/></td>";
    echo "<td>";
    echo "<table>";
    echo "<tr><td><h3>$row1[1]</h3></td></tr>";
    echo "<tr><td>Price : $row1[2]</td></tr>";
    echo "<tr><td>Color : $row2[3]</td></tr>";
    echo "<tr><td>RAM : $row2[9]  Internal-Storage:$row2[8] </td></tr>";
    echo "<tr><td><a class='btn'style='text-decoration:none' href='mycart.php?pid=$row1[0]&type=$row1[3]'>Add To Cart</a></td></tr>";
    echo "</table>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "<h1 style='margin-left:80px; margin-bottom=20px;'><b>Specification</b></h1>";
    echo "<table border='3px' style='text-align:left;border-collapse:collapse; padding:3px; margin-left:60px margin-bottom:30px' width='500px' height='400px' style='font-size:4px'>";
    echo "<tr><th>OS</th><td>$row2[1]</td></tr>";
    echo "<tr><th>Processor</th><td>$row2[2]</td></tr>";
    echo "<tr><th>Color</th><td>$row2[3]</td></tr>";
    echo "<tr><th>SIM_type</th><td>$row2[4]</td></tr>";
    echo "<tr><th>Hybrid SIM Slot</th><td>";
    if($row2[5]==0)
    {
        echo "No";
    }
    else
    {
        echo "Yes";
    }
    echo "</td></tr>";
    echo "<tr><th>Display Size</th><td>$row2[6]</td></tr>";
    echo "<tr><th>Resolution</th><td>$row2[7]</td></tr>";
    echo "<tr><th>Primary Camera</th><td>$row2[10]</td></tr>";
    echo "<tr><th>Secondary camera</th><td>$row2[11]</td></tr>";
    echo "<tr><th>Network Type</th><td>$row2[12]</td></tr>";
    echo "<tr><th>Battery Capacity</th><td>$row2[13]</td></tr>";
    echo "<tr><th>Width</th><td>$row2[14]</td></tr>";
    echo "<tr><th>Height</th><td>$row2[15]</td></tr>";
    echo "<tr><th>Warranty</th><td>$row2[16]</td></tr>";

    
    echo "</table>";
?>              
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
