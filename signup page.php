<?php 
    $msg="";
    if(isset($_POST['btnreg']))
    {
        $name=$_POST['txtname'];
        $email=$_POST['txtemail'];
        $pass=$_POST['txtpwd'];
        $gen=$_POST['gender'];
        $mobile=$_POST['txtmobile'];
        $dob=$_POST['txtdob'];
        $role='client';
        
        $con=mysqli_connect("localhost","root","","eshop");
        $qry="insert into usermaster(user_name,user_email,user_pwd,user_gender,user_mobile,user_dob,role) values('$name','$email','$pass','$gen','$mobile','$dob','$role')";
        mysqli_query($con,$qry);
        if(mysqli_affected_rows($con)>0)
        {
            $msg="Sign up Successful!!!!!";
        }
        else
        {
            $msg="Signup Unsuccessful!! TRY AGAIN";
        }
                
        mysqli_close($con);
        
    }
    
?>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/jpg" href="images/icon12.png" >
         <script>
         
         function validatePassword()
         {
             var a=document.getElementById("password").value;
             var b=document.getElementById("Cpassword").value;
             
             if(a!==b)
             {
                 document.getElementById("message1").innerHTML="Enter Same Password!!!";
                 return false;
                 
             }
         }
        </script>    
    </head>
    <body>
        <?php include'./header.php';?>
        <main>
            <div class="subcontainer">
                <div class="contentarea ">
            <form method="post" onsubmit="return validatePassword()">
            <table class="container">
                <tr>
                    <th align="center" style="color:purple; font-size:20" colspan="2"><b>Create New Account</b></th>
                </tr>
                <tr>
                    <td colspan="2"><hr width="400px" align ="center" size="5px" color="purple"></td>
                </tr>
                <tr>
                    <td><label>Name</label></td>
                    <td><input type="text" name="txtname" placeholder="Enter Name"required oninvalid="this.setCustomValidity('Name cannot be blank!!!!')" oninput="this.setCustomValidity('')"  id="Name"></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td><input type="email" name="txtemail" placeholder="Enter Email"required oninvalid="this.setCustomValidity('Email format does not Match!!!!')" oninput="this.setCustomValidity('')" id="Email"></td>
                </tr>
                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" name="txtpwd" placeholder="Enter Password" oninvalid="this.setCustomValidity('Password must contain 8 characters 2 upper 2 lower at least 1 digit and 1 symbol!!!!')" required id="password" ></td>
                    
                
                </tr>
                <tr>
                    <td><label>Confirm Password</label></td>
                    <td><input type="password" name="txtcpwd" placeholder="Enter Confirm Password"required  id="Cpassword"></td>
                    <td><span id="message1" style="color:red"></span></td>
                    
                </tr>
                <tr>
                    <td><label>Gender</label></td>
                    <td>
                        <input type="radio" size="5px" name="gender" value="Male"/>Male
                        <input type="radio" name="gender" value="Female"/>Female
                    </td>
                </tr>
                <tr>
                    <td><label>Mobile</label></td>
                    <td><input type="number" min="0000000000" max="9999999999" name="txtmobile"/></td>
                </tr>
                <tr>
                    <td><label>Date Of Birth</label></td>
                    <td><input type="date" name="txtdob" required oninvalid="this.setCustomValidity('DOB cannot be blank!!!!')" oninput="this.setCustomValidity('')" id="t1" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input class="btn"  type="submit" name="btnreg" value="Register"  onclick="validatePassword()"/></td>
                    
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo $msg;
                        ?></td>
                </tr>
                
            </table>
                
            
                </form>
                </div>
                <div class="rightpanel">
                  
                    <img src="images/sign in.jpg" width="500px" heigth="600px"/>
                </div>
            </div>
            
                
            
        </main>
        <?php include './footer.php'?>
    </body>
</html>