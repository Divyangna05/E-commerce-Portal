<?php
session_start();
if(!isset($_SESSION['uname']))
{
    header("location:Sign In.php");
}
$msg= "";
if(isset($_POST['btnorder']))
{   
    
    $userid = $_SESSION['uid'];
    $pid = $_COOKIE['cart'];
    $date = date("Y-m-d");
    $amt = $_SESSION['total'];
    $address = $_POST['txtname'].",".$_POST['txtaddress'];
    $mode = $_POST['paymentmode'];
    $status = "Undelivered";
    include 'dbinfo.php';
    $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
    $qry ="insert into orders(user_id,pid,order_date,amount,address,payment,status) values($userid,'$pid','$date',$amt,'$address','$mode','$status')";
    mysqli_query($con, $qry);
    if(mysqli_affected_rows($con)>0)
    {
        $msg="<h2 style='color:green'>Order placed successfully!!!!!</h2>";
        setcookie("cart","");
    }
    else
    {
        $msg="<h2 style='color:red'>Order Not placed. Try Again !!!!!</h2>";
    }
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
        <main style="margin-top:50px; margin-bottom:200px">
            <center>
                <form method="post">
                    <table class="container">
                        <tr><th colspan="2" align="center"><h2>Shipping Address</h2></th></tr>
                        <tr>
                        <td colspan="2"><hr width="500px" align ="center" size="5px" color="purple"></td>
                        </tr>
                        <tr>
                            <td><label>Name</label></td>
                            <td><input type="text" name="txtname" required oninvalid="this.setCustomValidity('Name cannot be blank!!!!')" oninput="this.setCustomValidity('')" /></td>
                        </tr>
                        <tr>
                            <td><label>Address</label></td>
                            <td><textarea style="height:100px" name="txtaddress" required oninvalid="this.setCustomValidity('Address cannot be blank!!!!')" oninput="this.setCustomValidity('')"  ></textarea></td>
                        </tr>
                        <tr>
                            <td><label>Payment Mode</label></td>
                            <td>
                                <select name="paymentmode" class='form-input' required oninvalid="this.setCustomValidity('Payment Mode cannot be blank!!!!')" oninput="this.setCustomValidity('')" >
                                    <option>Select Payment Mode</option>
                                    <option>Cash on Delivery</option>
                                    <option>Credit Card</option>
                                    <option>Debit Card</option>
                                    <option>Internet Banking</option>
                                    <option>UPI</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align='center'><input type="submit" name="btnorder" value="Place Order " class="btn"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><?php echo $msg; ?></td>
                        </tr>
                    </table>
                    
                </form>
            </center>
            
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>