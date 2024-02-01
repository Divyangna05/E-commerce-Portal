<?php
session_start();
if(isset($_SESSION['role']))
{
    if($_SESSION['role']!='Admin')
    {
        header("location:index.php");
    }
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
                error_reporting(0);
                $con=mysqli_connect("localhost","root","","eshop") ;
                $result=mysqli_query($con,"select * from usermaster");
                if(mysqli_num_rows($result)>0)
                {
                    echo "<table width='1000px' style='padding:2px 2px 2px 2px' border='1px'>";
                    echo"<tr>";
                    echo"<th>User Id</th>";
                    echo"<th>User Name</th>";
                    echo"<th>User Email</th>";
                    echo"<th>User Password</th>";
                    echo"<th>Gender</th>";
                    echo"<th>Mobile No</th>";
                    echo"<th>DOB</th>";
                    echo"<th>Role</th>";
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
                       
       
                        echo"<td><a class='btn' style='text-decoration:none' href='deleteuser.php'>DELETE</a></td>";
                        echo"</tr>";
                        
                    }
                    echo "</table>";
                }
                else
                    echo"<h2>NO USER FOUND !!!</h2>";
            ?>
                
                
            </div>
            
        </main>
        <?php include './footer.php'?>
    </body>
</html>