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
 $msg="";
    if(isset($_POST['btnreg'])){
        $name = $_POST['txtname'];
        $email = $_POST['txtemail'];
        $pass = $_POST['txtpwd'];
        $gen = $_POST['gender'];
        $mobile=$_POST['txtmobile'];
        $dob=$_POST['txtdob'];
        $role=$_POST['role'];
         include './dbinfo.php';
         $conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
        $qry = "insert into usermaster(user_name,user_email,user_pwd,user_gender,user_mobile,user_dob,role) values('$name','$email','$pass','$gen',$mobile,'$dob','$role')";
        mysqli_query($conn, $qry);
        if(mysqli_affected_rows($conn)>0)
            $msg = "SignUp Successful !!!!!";
        else
            $msg = "SignUp Not Successful. Try Again !!!!!!";
        mysqli_close($conn);
    }
?>


    <head>
        <link href="style.css" rel="stylesheet">
        <link rel="icon" type="image/jpg" href="images/icon12.png" >
    </head>
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
    
        <?php include'./header.php';?>
        <main style="display:flex">
            
            <div class="leftpanel">
              <?php
                include'./adminpanel.php';
                ?>
            </div>
                <div class="rightpanel">
                   <form method="post">
            <table class="container">
                <tr>
                    <th colspan="2" align="center" style="font-size:20px"><b>Add New User</b></th>   
                </tr>
                <tr>
                    <td colspan="2"><hr width="400px" align ="center" size="5px" color="brown"></td>
                </tr>
                 <tr>
                    <td><label>Name</label></td>
                    <td><input type="text" name="txtname" placeholder="Enter Name" required oninvalid="this.setCustomValidity('Name cannot be blank!!!!')" oninput="this.setCustomValidity('')"></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td><input type="email" name="txtemail" placeholder="Enter Email"required oninvalid="this.setCustomValidity('Email cannot be blank!!!!')" oninput="this.setCustomValidity('')"></td>
                </tr>
                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" name="txtpwd" placeholder="Enter Password" required id="password" oninvalid="this.setCustomValidity('Password must contain 8 characters 2 upper 2 lower at least 1 digit and 1 symbol!!!!')" oninput="this.setCustomValidity('') "></td>
                </tr>
                <tr>
                    <td><label>Confirm Password</label></td>
                    <td><input type="password" name="txtcpwd" placeholder="Enter Confirm Password" required id="Cpassword" oninvalid="this.setCustomValidity('Confirm Password cannot be blank!!!!')" oninput="this.setCustomValidity('')"></td>
                    <td><span id="message1" style="color:red"></span></td>
                </tr>
                <tr>
                    <td><label>Gender</label></td>
                    <td>
                        <input type="radio" name="gender" value="Male" />Male
                        <input type="radio" name="gender" value="Female"/>Female
                    </td>
                </tr>
                <tr>
                    <td><label>Mobile</label></td>
                    <td><input type="number" min="0000000000" max="9999999999" name="txtmobile" required oninvalid="this.setCustomValidity('Mobile Number cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                </tr>
                <tr>
                    <td><label>Date Of Birth</label></td>
                    <td><input type="date" name="txtdob" required oninvalid="this.setCustomValidity('DOB cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                </tr>
                <tr>
                    <td><label>User Type(ROLE)</label></td>
                    <td>
                        <select>
                            <option></option>
                            <option>client</option>
                            <option>Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input class="btn" type="submit" name="btnreg" value="Register" onclick="validatePassword()"/></td>   
                </tr>
                <tr>
                    <td> <?php
                    echo $msg;
                    ?></td>
                </tr>
            </table>
        </form>
            </div>
                <div class="rightpanel" style="margin-left:600px">
                  
                    <img src="images/add user.jpg" width="400px" height="700px" />
                </div>
            
        </main>
        <?php include './footer.php';?>
</html>
    
  