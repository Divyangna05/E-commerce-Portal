<?php

session_start();
if(isset($_SESSION['uname']))
{
    header("location:index.php");
}
    $msg="";
    if(isset($_POST['signinbtn']))
    {
        $uname = $_POST['txt_name'];
        $pwd = $_POST['txt_pass'];
        include './dbinfo.php';
        $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
        $result = mysqli_query($con, "select * from usermaster where user_name='$uname' and user_pwd='$pwd' " );
        if(mysqli_num_rows($result)>0){
            
            $row = mysqli_fetch_array($result);
            if(isset($_POST['rem']))
            {
                
                setcookie("cookie1",$uname,time()+60*60*24);
                setcookie("cookie2",$pwd,time()+60*60*24);
                
            }
            $_SESSION['uname']=$row[1];
            $_SESSION['role']=$row[7];
            $_SESSION['uid']=$row[0];
            
            
            header("location:index.php");
        }
        else{
            $msg="<font color='red'><b>Invalid username and password !!!!!<b></font>";
        }
        mysqli_close($con);
    }

?>
<html>
    <head>
        <link href="style.css" rel="stylesheet">  
        <link rel="icon" type="image/jpg" href="images/icon12.png" >
    </head>
    <body>
        <?php include'./header.php';?>
        <main>
            <div class="subcontainer">
                <div class="contentarea">
                    <form method="post">
                <table class="container">
                    <tr>
                        <td colspan="2" align="center"><label><b>SIGN IN</b></label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr width="400px" align ="center" size="5px" color="purple"></td>
                    </tr>
                    <tr>
                        <td><label>User Name</label></td>
                        <td><input type="text" name="txt_name" placeholder="Enter User Name" required oninvalid="this.setCustomValidity('Name cannot be blank!!!!')" oninput="this.setCustomValidity('')" id="name"/></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input type="password" name="txt_pass" required oninvalid="this.setCustomValidity('Password cannot be blank!!!!')" oninput="this.setCustomValidity('')" id="password"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="left"><input type="checkbox" name="rem" value="on"/> Remember Me !</td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" align='center'><input type="submit" name="signinbtn" class="btn" value="SIGN IN" align="center"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php echo $msg;
                            ?>
                        </td>
                    </tr>
                    <tr><td colspan='2'><div align="left" style="padding:10px"><a style="color: maroon; font-weight: bold" href="">Forgot Password Click Here !!!!!</a></div></td>
                    </tr>
                </table>
            </form>
                </div>
                 <div class="rightpanel">
                  
                    <img src="images/sign in.jpg"  width="500px" heigth="600px" />
                </div>
            </div>
            <?php echo $msg; ?>
                     </form>
                 
            </div>
            
        </main>
        <?php include './footer.php'?>
    </body>
</html>