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
        <main style="margin-left: 100px; margin-bottom:600px; margin-top: 30px">
             <?php 
             if(isset($_COOKIE['cart'])){
                 $products = $_COOKIE['cart'];
                include 'dbinfo.php';
                $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
                $result = mysqli_query($con, "select * from productmaster where pid in ($products)");
                    if(mysqli_num_rows($result)>0){
                        echo "<table style='width:80%; border-collapse:collapse' border='1px' padding='10px' >";
                        echo "<tr>";
                        echo "<th>Product</th>";
                        echo "<th>Name</th>";
                        echo "<th>Price</th>";
                        echo "<th style='text-align:right'></th>";
                        echo "</tr>";
                        $amount=0;
                       while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td align='center'><img src='$row[4]' width='80px' height='80px'/></td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            $amount+=$row[2];
                            echo "<td style='text-align:center'><a href='deletecart.php?php'><img src='images/download.png' width='100px' height='50px'/></a></td>";
                            echo "</tr>";
                        }
                        $_SESSION['total']=$amount;
                        echo "<tr>";
                            echo "<td colspan='4' align='right'>Total Amount: <b>$amount</b></td>";
                        echo "</tr>";
                        echo "<tr>";
                            
                            echo "<td colspan='4' height='50px' width='100px' align='right'><a class='btn' style='text-decoration:none' href='shipping.php'>Place Order</a></td>";
                        echo "</tr>";
                        echo "</table>";
                    }
                     mysqli_close($con);
             }
             else
                echo "<h2>Cart is Empty!!!!</h2>";
                   
             ?>
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>