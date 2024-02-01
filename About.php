<?php
session_start();
?>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
        <link rel="icon" type="image/jpg" href="images/icon12.png" >
        </head>
    <body>
 
        <?php include'./header.php';?>
        <main style="margin-left: 100px; margin-bottom:220px; margin-top: 30px">
            <h1 style="margin-left:350px; margin-bottom:30px">ABOUT US</h1>
            <table class="container" align="center" style="padding:10px; font-size:18px; text-align:left">
                <tr>
                    <th>Submitted By</th>
                    <td style="color:red"><b>Divyangna Kale</b></td>
                </tr>
                <tr>
                    <th>Submitted To</th>
                    <td style="color:red"><b>Prof. Santosh Kumar</b></td>
                </tr>
                <tr>
                    <th>Project Name</th>
                    <td style="color:red"><b>E-shop Portal</b></td>
                </tr>
                <tr>
                    <th>Version</th>
                    <td style="color:red"><b>Shopping-1.0V</b></td>
                </tr>
            </table>
         </main>
        <?php include './footer.php'?>
    </body>
</html>