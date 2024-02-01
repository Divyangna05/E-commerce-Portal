
<header>
    <div class="header-row1">
       
            <ul>
                
                <li><a style="color:white" href="About.php">About Us</a></li>
                <li><a style="color:white" href="Privacy.php">Privacy</a></li>
                <li><a style="color:white" href="FAQ.php">FAQs</a></li>
                <li style="color:#ffffcc; font-weight: bold"><?php
                        if(isset($_SESSION['uname'])){
                            echo "(Welcome $_SESSION[uname])";
                        }
                    ?></li>
                
            </ul>
       
    </div>
    <div class="header-row2">
        
       
        <table style="border-spacing:5px">
            
            <tr>
                <td rowspan="2"><img src="images/icon11.png" border="1px" width="100px" height="100px"/></td>
                <td>
                        <td><img src="images/home.png" width="80px" height="80px" /></td>
                        <td><img src="images/televison.jpg" width="80px" height="80px" /></td>
                        <td><img src="images/mobile.jpg" width="80px" height="80px" /></td>
                        <td><img src="images/cart.png" width="80px" height="80px" /></td>
                        <td><img src="images/contact us.jpg" width="80px" height="80px" /></td>
                        
                 </td>
      
            </tr>
            <tr>
                
                    <td >
                    <td  style="background-color:#00cccc; color:white;text-align:center; border:1px; box-shadow:2px 1px 1px 1px grey" width="20px" height="20px" ><a class="headera" style="color:white" href="index.php"><b>Home</b></a></td>
                    <td style="text-align: center;" ><a class="headera" href="televisions.php"><b>Television</b></a></td>
                    <td style="text-align: center;"><a class="headera" href="Mobile.php"><b>Mobile</b></a></td>                        
                        <td style="text-align: center;"><a class="headera" href="Cart.php"><b>Cart</b></a></td>
                        <td style="text-align: center;"><a class="headera" href="Contact Us.php"><b>Contact Us</b></a></td>
                        
                        <?php
                        if(!isset($_SESSION['uname'])){
                            echo "<td  style='text-align: center;background-color:#00cccc; color:white;text-align:center; border:1px; box-shadow:2px 1px 1px 1px grey' width='100px'/><a style='color:white' class='headera' href='Sign In.php'><b>Sign In</b></a></td>";
                        
                            echo "<td style='text-align: center;background-color:#00cccc; color:white;text-align:center; border:1px; box-shadow:2px 1px 1px 1px grey' width='100px' ><a class='headera' style='color:white' href='signup page.php'><b>Sign Up</b></a></td>";
                       
                        }
                    ?>
                        
                        
                        
                         <?php
                        if(isset($_SESSION['role']))
                        {
                            if($_SESSION['role']=='Admin'){
                                echo "<td style='text-align: center;background-color:#00cccc; color:white;text-align:center; border:1px; box-shadow:2px 1px 1px 1px grey'width='100px'><a class='headera' style='color:white' href='Admin.php'><b>Admin</b></a></td>";
                            }
                        }
                    ?>
                    
                     <?php
                        if(isset($_SESSION['uname'])){
                            echo "<td colspan='5' align='right' style='text-align:center;background-color:#00cccc; color:white ;text-align:center; border:1px; box-shadow:2px 1px 1px 1px grey' width='100px'><a class='headera' style='color:white' href='logout.php'><b>Logout</b></a></td>";
                        }
                    ?>
                    </td>
                </tr> 
                
               
        </table>
    </div>
</header>

    