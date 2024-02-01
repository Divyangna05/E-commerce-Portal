<?php
session_start();
if(isset($_SESSION['role']))
{
    if($_SESSION['role']!='Admin')
        header("location:index.php");
}
else{
    header("location:signin.php");
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
                                error_reporting(0);
                $con=mysqli_connect("localhost","root","","eshop") ;
                $result=mysqli_query($con,"select * from productmaster");
                if(mysqli_num_rows($result)>0)
                {
                    echo "<table width='1200px' height='800px' border='1'>";
                    echo"<tr>";
                    echo"<th>Product Id</th>";
                    echo"<th>Product Name</th>";
                    echo"<th>Product Price</th>";
                    echo"<th>Product Type</th>";
                    echo"<th>Product Image</th>";
                    echo"<td></td>";
                    echo"<td></td>";
                    
                    echo"</tr>";
                    
                    while($row=mysqli_fetch_array($result))
                    {
                        echo"<tr>";
                        echo"<td>$row[0]</td>";
                        echo"<td>$row[1]</td>";
                        echo"<td>$row[2]</td>";
                        echo"<td>$row[3]</td>";
                       
                        echo"<td><img src='$row[4]' width='100px' height='100px'/></td>";
                        $path="";
                        if($row[3]=="Mobile")
                        {
                                   $path="addmobiledesc.php?pid=$row[0]";
                        }
                            else
                            {
                                   $path="addtelevision desc.php?pid=$row[0]";
                            }
                            echo "<td align='center'><a class='btn' style='text-decoration:none' href='$path'>Add Desc</a></td>";
                            echo "<td align='center'><a class='btn' style='text-decoration:none' href='deleteproduct.php'>Delete</a></td>";
                            echo "</tr>";
                        
                    }
                    echo "</table>";
                }
                
                else
                {
                    echo"<h2>NO PRODUCT FOUND !!!</h2>";
                }
            ?>
                
                
            
            </div>
        </main>
        <?php include './footer.php'?>
    </body>
</html>