<?php
session_start();
if(isset($_SESSION['role']))
{
    if($_SESSION['role']!='Admin')
        header("location:index.php");
}
else{
    header("location:Sign In.php");
}
?>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
        <link rel="icon" type="image/jpg" href="images/icon12.png" >
        
    </head>
    <body>
        <?php include'./header.php';?>
        <main style="display:flex">
          
            <div class="leftpanel">
             <?php
                include'./adminpanel.php';
                ?>
            </div>
            <div class="rightpanel">
                <?php
                include 'dbinfo.php';
                $con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) ;
                $result=mysqli_query($con,"select * from orders");
                if(mysqli_num_rows($result)>0)
                {
                    echo "<table width='1000px' border='1'>";
                    echo"<tr>";
                    echo"<th>Order ID</th>";
                    echo"<th>User ID</th>";
                    echo"<th>Product ID</th>";
                    echo"<th>Order Date</th>";
                    echo"<th>Amount</th>";
                    echo"<td>Address</td>";
                    echo"<td>Payment Status</td>";
                    echo"<td>Status</td>";
                    echo"</tr>";
                    
                    while($row=mysqli_fetch_array($result))
                    {
                        echo"<tr>";
                        echo"<td>$row[0]</td>";
                        echo"<td>$row[1]</td>";
                        echo"<td>$row[2]</td>";
                        echo"<td>$row[3]</td>";
                        echo"<td>$row[4]</td>";
                        echo"<td>$row[5]</td>";
                        echo"<td>$row[6]</td>";
                        echo"<td>$row[7]</td>";
                        echo "</tr>";
                        
                    }
                    echo "</table>";
                }
                
                else
                {
                    echo"<h2>NO ORDER FOUND !!!</h2>";
                }
            ?>
                
                
           
            </div>
        </main>
        <?php include './footer.php'?>
    </body>
</html>