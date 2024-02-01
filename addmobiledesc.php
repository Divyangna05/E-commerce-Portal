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
        $os = $_POST['txt_os'];
        $processor = $_POST['txt_processor'];
        $color = $_POST['txt_color'];
        $stype=$_POST['txt_simtype'];
        $hybrid=$_POST['hybrid'];
        $dsize=$_POST['dsize'];
        $resolution=$_POST['resolution'];
        $internal=$_POST['internal'];
        $ram=$_POST['ram'];
        $primary=$_POST['primary'];
        $secondary=$_POST['secondary'];
        $ntype=$_POST['ntype'];
        $bcapacity=$_POST['bcapacity'];
         $width=$_POST['width'];
         $height=$_POST['height'];
         $warranty=$_POST['warranty'];
         
        
        
                    include './dbinfo.php';
                    $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
                    $query = "insert into mobilespecification values('$id','$os','$processor','$color','$stype','$hybrid','$dsize','$resolution','$internal','$ram','$primary','$secondary','$ntype','$bcapacity','$width','$height','$warranty')";
                    mysqli_query($con, $query);
                    if(mysqli_affected_rows($con)>0)
                    {
                        $msg= "Mobile Specification Added Successfuly!!!!!";
                    }
                    else
                    {
                        $msg= "Mobile Specification Not Added. Try Again.....";
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
                            <th colspan="2" align="center">ADD MOBILE DESCRIPTION</th>
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
                            <td><label>OS</label></td>
                            <td><input type="text" name="txt_os"required oninvalid="this.setCustomValidity('OS cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Processor</label></td>
                            <td><input type="text" name='txt_processor' required oninvalid="this.setCustomValidity('Processor cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Color</label></td>
                            <td><input type="text" name='txt_color'required oninvalid="this.setCustomValidity('Color cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>SIM Type</label></td>
                            <td><input type="text" name='txt_simtype'required oninvalid="this.setCustomValidity('SIM type cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Hybrid SIM Slot</label></td>
                            <td style="padding-left: 10px;height: 34px;">
                                <input type="radio" name='hybrid' value="Yes"/> Yes 
                                <input type="radio" name='hybrid' value="No"/> No
                            </td>
                        </tr>
                        <tr>
                            <td><label>Display Size</label></td>
                            <td><input type="text" name="dsize" required oninvalid="this.setCustomValidity('Display Size cannot be blank!!!!')" oninput="this.setCustomValidity('')" ></td>
                           
                        </tr>
                        <tr>
                            <td><label>Resolution</label></td>
                            <td><input type="text" name="resolution" required oninvalid="this.setCustomValidity('Resolution cannot be blank!!!!')" oninput="this.setCustomValidity('')"></td>
                            
                        </tr>
                        <tr>
                            <td><label>Internal Storage</label></td>
                            <td><input  type="text" name="internal"required oninvalid="this.setCustomValidity('Internal Storage cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        
                        <tr>
                            <td><label>RAM</label></td>
                            <td><input type="text" name="ram" required oninvalid="this.setCustomValidity('RAM cannot be blank!!!!')" oninput="this.setCustomValidity('')" ></td>
                        </tr>
                        <tr>
                            <td><label>Primary Camera</label></td>
                            <td><input type="text" name="primary" required oninvalid="this.setCustomValidity('Primary Camera cannot be blank!!!!')" oninput="this.setCustomValidity('')"></td>
                        </tr>
                        <tr>
                            <td><label>Secondary Camera</label></td>
                            <td><input type="text" name="secondary" required oninvalid="this.setCustomValidity('Secondary Camera cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Network Type</label></td>
                            <td><input type="text" name="ntype" required oninvalid="this.setCustomValidity('Network Type cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Battery Capacity</label></td>
                            <td><input type="text" name="bcapacity" required oninvalid="this.setCustomValidity('Battery Capacity cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Width</label></td>
                            <td><input type="text" name="width" required oninvalid="this.setCustomValidity('Width cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Height</label></td>
                            <td><input type="text" name="height" required oninvalid="this.setCustomValidity('Height cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
                        </tr>
                        <tr>
                            <td><label>Warranty</label></td>
                            <td><input type="text" name="warranty"required oninvalid="this.setCustomValidity('Wrranty cannot be blank!!!!')" oninput="this.setCustomValidity('')"/></td>
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
