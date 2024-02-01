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
    header("location:Sign in.php");
}
$msg = "";
    if(isset($_POST['add_desc'])){
       
        $id=$_POST['txt_pid'];
        $box = $_POST['txt_box'];
        $color = $_POST['txt_color'];
        $dsize = $_POST['txt_dsize'];
        $stype=$_POST['txt_stype'];
        $hdtech=$_POST['txt_hdtech'];
        $smarttv=$_POST['smarttv'];
        $msensor=$_POST['msensor'];
        $hdmi=$_POST['txt_hdmi'];
        $wallmnt=$_POST['wallamt'];
        $wifi=$_POST['wifi'];
        $usb=$_POST['txt_usb'];
        $year=$_POST['txt_year'];
        
                    include './dbinfo.php';
                    $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
                    $query = "insert into tv_specification values('$id','$box','$color','$dsize','$stype','$hdtech','$smarttv','$msensor','$hdmi','$wallmnt','$wifi','$usb','$year')";
                    mysqli_query($con, $query);
                    if(mysqli_affected_rows($con)>0)
                    {
                        $msg= "TV Specification Added Successfuly!!!!!";
                    }
                    else
                    {
                        $msg= "TV Specification Not Added. Try Again.....";
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
        <main style="display:flex">
           <div class="subcontainer">
            <div class="leftpanel">
             <?php
                include'./adminpanel.php';
                ?>
            </div>
            <div class="contentarea">
                <form method="post" enctype="multipart/form-data">
                    <table class="container">
                        <tr>
                            <th colspan="2" align="center">ADD TV DESCRIPTION</th>
                        </tr>
                        <tr>
                        <td colspan="2"><hr width="400px" align ="center" size="5px" color="purple"></td>
                    </tr>
                        <tr>
                            <td><label>Product ID</label></td>
                            <td><input type="text" value=" 
                            <?php
                            if(isset($_GET['pid'])){
                                echo $_GET['pid']; 
                            }
                            ?>" name='txt_pid'/></td>
                        </tr>
                        <tr>
                            <td><label>In The Box</label></td>
                            <td><input type="text" name="txt_box"required oninvalid="this.setCustomValidity('In Box cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Color</label></td>
                            <td><input type="text" name='txt_color' required oninvalid="this.setCustomValidity('Color cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Display Size</label></td>
                            <td><input type="text" name='txt_dsize' required oninvalid="this.setCustomValidity('Display Size cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Screen Type</label></td>
                            <td><input type="text" name='txt_stype'required oninvalid="this.setCustomValidity('Screen Type cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>HD Technology & Resolution</label></td>
                            <td><input type="text" name='txt_hdtech' required oninvalid="this.setCustomValidity('Hd tech and Resolution cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Smart Tv</label></td>
                            <td style="padding-left: 10px;height: 34px;">
                                <input type="radio" name='smarttv' value="Yes"/> Yes 
                                <input type="radio" name='smarttv' value="No"/> No
                            </td>
                        </tr>
                        <tr>
                            <td><label>Motion Sensor</label></td>
                            <td style="padding-left: 10px;height: 34px;">
                                <input type="radio" name='msensor' value="Yes"/> Yes 
                                <input type="radio" name='msensor' value="No"/> No
                            </td>
                        </tr>
                        <tr>
                            <td><label>HDMI</label></td>
                            <td><input  type="number" name='txt_hdmi'required oninvalid="this.setCustomValidity('HDMI cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        
                        <tr>
                            <td><label>Wall Mount Included</label></td>
                            <td style="padding-left: 10px;height: 34px;" >
                                <input style="" type="radio" name='wallamt' value="Yes"/> Yes 
                                <input type="radio" name='wallamt' value="No"/> No
                            </td>
                        </tr>
                        
                        <tr>
                            <td><label>USB</label></td>
                            <td><input type="number" name='txt_usb' required oninvalid="this.setCustomValidity('USB cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Built In Wi-Fi</label></td>
                            <td style="padding-left: 10px;height: 34px;">
                                <input type="radio" name='wifi' value="Yes"/> Yes 
                                <input type="radio" name='wifi' value="No"/> No
                            </td>
                        </tr>
                        <tr>
                            <td><label>Launch Year</label></td>
                            <td><input type="number" name='txt_year'required oninvalid="this.setCustomValidity('Launch Year cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        
                        
                        
                        <tr>
                        <td colspan="2"><input class="btn" type="submit" name='add_desc' value="Add Description"/></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <?php echo $msg;
                                ?>
                            </td>
                        </tr>
                </table>
                    
                     </form>
                    </div>
            </div>
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
