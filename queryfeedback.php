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
                include 'dbinfo.php';
                $con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) ;
                $result=mysqli_query($con,"select * from contactus");
                if(mysqli_num_rows($result)>0)
                {
                    echo "<table width='1000px' border='1'>";
                    echo"<tr>";
                    echo"<th>Query ID</th>";
                    echo"<th>Name</th>";
                    echo"<th>Email</th>";
                    echo"<th>Phone Number</th>";
                    echo"<th>Query/Feedback</th>";
                   
                    echo"</tr>";
                    
                    while($row=mysqli_fetch_array($result))
                    {
                        echo"<tr>";
                        echo"<td>$row[0]</td>";
                        echo"<td>$row[1]</td>";
                        echo"<td>$row[2]</td>";
                        echo"<td>$row[3]</td>";
                        echo"<td>$row[4]</td>";
                        
                        echo "</tr>";
                        
                    }
                    echo "</table>";
                }
                
                else
                {
                    echo"<h2>NO QUERY/ FEEDBACK FOUND !!!</h2>";
                }
            ?>
                
                
           
            </div>
        </main>
        <?php include './footer.php'?>
    </body>
</html>