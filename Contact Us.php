<?php
session_start();
    $msg="";
    if(isset($_POST['btnsubmit'])){
            $name=$_POST['txtname'];
            $email=$_POST['txtemail'];
            $mobile=$_POST['txtphone'];
            $query=$_POST['txtmsg'];
            $date= date("Y-m-d");
            $con= mysqli_connect("localhost","root","","eshop");
            $qry = "insert into contactus(name,email,phoneno,message,date) values('$name','$email',$mobile,'$query','$date')";
        mysqli_query($con, $qry);
        if(mysqli_affected_rows($con)>0)
            $msg = "Query Sent Successfully !!";
        else
            $msg = "Query Not Sent!!";
        mysqli_close($con);
            
    }
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/jpg" href="images/icon12.png" >
    </head>
    <body>
        <?php include './header.php'; ?>
        <main>
             <table class="container" >
                 <tr>
                     <td valign="top" width="50%" style="padding:40px 10px">
                        
                             <form method="post">
                             <table>
                                 <caption>
                                    Query/Feedback Form
                                    <hr size="4" color="maroon" style="padding:0px; margin-top: 5px"><br><br>
                                 </caption>
                                 <tr>
                                     <td><label>Name</label></td>
                                     <td><input type="text"  name="txtname"/></td>
                                 </tr>
                                 <tr>
                                     <td><label>Email Id</label></td>
                                     <td><input type="email"  name="txtemail"/></td>
                                 </tr>
                                 <tr>
                                     <td><label>Phone Number</label></td>
                                     <td><input type="number" name="txtphone"/></td>
                                 </tr>
                                 <tr>
                                     <td><label>Query/Feedback</label></td>
                                     <td><textarea style="height: 160px"  name="txtmsg"></textarea></td>
                                 </tr>
                                 <tr>
                                   
                                     <td colspan="2"><input type="submit" class="btn" name="btnsubmit" value="Send"/></td>
                                 </tr>
                             </table>
                                 <?php echo $msg; ?>
                             </form>
                        
                     </td>
                     <td valign="top" width="50%" style="padding: 10px">
                         
                         <iframe style="margin-top: 60px"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224154.65231664875!2d77.12048435640274!3d28.617278448001944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce9eb11ac32c7%3A0x4ab49367ab1ddd97!2sUptown%20Square!5e0!3m2!1sen!2sin!4v1688465712549!5m2!1sen!2sin" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                         <br>
                         <address style="padding: 10px; width: 580px; font-family: sans-serif; font-weight: bold; box-shadow: 1px 1px 4px gray">
                            Organization Name:Shopping <br>
                            Web Site: <a href="">shopping.com</a><br>
                            visit us:<br>
                            Shopping<br>
                            Shopping, Business Park<br>
                            AB Road, Indore.
                            
                         </address>
                     </td>
                 </tr>
             </table>
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
