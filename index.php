<?php
session_start();
?>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
        <link rel="icon" type="image/jpg" href="images/icon12.png" >
        <script>
            var i=0;
            var arr=["images/slider1.png","images/slider2.png","images/slider3.png","images/slider4.png"];
            function changeImage()
            {
                if(i<4)
                {
                    
                    document.getElementById("m1").src=arr[i];
                    i++;
                }
                else
                    i=0;
            }
            function startSlider()
            {
                setInterval(changeImage,1000);
            }
            </script>
                  
    </head>
    <body onload = "startSlider()">
 
        <?php include'./header.php';?>
        <main>
            <div margin="10px" border="2px" box-shadow="1px 1px 1px 1px grey" width="100%" height="100%">
            <img src="images/slider1.png" id="m1"/>
                </div>
            
            <div>
                <?php
                include './dbinfo.php';
                $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
                $qry = "select * from productmaster where ptype='mobile'";
                $result = mysqli_query($con, $qry);
                if(mysqli_num_rows($result)>0)
                {
                    
                    $count = 0;
                    while($r = mysqli_fetch_assoc($result))
                    {
                    
                        if($count==0)
                            echo "<div class='row'>";
                        $count++;
                        echo "<div class='column' align='center'>";
                     
                            echo "<a style='text-decoration:none' href='mobiledesc.php?pid=$r[pid]'><div class='product'>";
                                echo "<div class='row1'>";
                                    echo "<div class='datacolumn'><img src='$r[pimage]'border-width='2px' box-shadow='1px 1px 1px 1px grey' width='300px' height='280px'/></div>";
                                echo "</div>";
                                echo"<div class='row1'>";
                                    echo "<div class='datacolumn'>$r[pname]</div>";
                                echo "</div>";
                                echo "<div class='row1'>";
                                    echo "<div class='datacolumn'>Rs. $r[pprice]</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        
                        if($count==4){
                            echo "</div>";
                            $count=0;
                            }
                    
                    }
                }
                
                    
                   else
                   {
                   
                    echo "<h2>No Product Found!!!</h2>";
                }
                    
                
                mysqli_close($con);
            ?>
           </div>  
            <div>
                <?php
                
                $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
                $qry = "select * from productmaster where ptype='Television' ";
                $result = mysqli_query($con, $qry);
                if(mysqli_num_rows($result)>0)
                {
                    $count = 0;
                    while($r = mysqli_fetch_assoc($result)){
                        if($count==0)
                        {
                            echo "<div class='row'>";
                        }
                        $count++;
                        echo "<div class='column' align='center'>";
                            echo "<a style='text-decoration:none' href='televisiondesc.php?pid=$r[pid]'><div class='product'>";
                                echo "<div class='row1'>";
                                    echo "<div class='datacolumn'><img src='$r[pimage]' border-width='2px' box-shadow='1px 1px 1px 1px grey' width='280px' height='300px' /></div>";
                                echo "</div>";
                                echo"<div class='row1'>";
                                    echo "<div class='datacolumn'>$r[pname]</div>";
                                echo "</div>";
                                echo "<div class='row1'>";
                                    echo "<div class='datacolumn'>Rs. $r[pprice]</div>";
                                echo "</div>";
                            echo "</div></a>";
                        echo "</div>";
                        
                        if($count==4){
                            echo "</div>";
                            $count=0;
                        }
                    }
                }
                else{
                    echo "<h2>No Product Found!!!</h2>";
                }
                mysqli_close($con);
            ?>
            </div>
             
                
        </main>
        <?php include './footer.php'?>
    </body>
</html>