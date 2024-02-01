<?php

session_start();
if(isset($_SESSION['role']))
{
    if($_SESSION['role']!='Admin')
        header("location:index.php");
}
else{
    header("location:Sign In.php");
}

 $msg = "";
    if(isset($_POST['add_product'])){
        $id = $_POST['txt_pid'];
        $name = $_POST['txt_pname'];
        $type = $_POST['ptype'];
        $price = $_POST['txt_price'];
        $path="";
        if($_FILES['pimage']['error']==0 ){
            if($_FILES['pimage']['type']=="image/jpg" || $_FILES['pimage']['type']=="image/png" || $_FILES['pimage']['type']=="image/jpeg"){
                $sou = $_FILES['pimage']['tmp_name'];
                $des = $_SERVER['DOCUMENT_ROOT']."/Eshop/product/".$_FILES['pimage']['name'];
                if(move_uploaded_file($sou, $des)){
                    $path="product/".$_FILES['pimage']['name'];
                    include './dbinfo.php';
                    $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
                    $query = "insert into productmaster values($id,'$name',$price,'$type','$path')";
                    mysqli_query($con, $query);
                    if(mysqli_affected_rows($con)>0)
                        $msg= "Product Add Successfuly!!!!!";
                    else
                        $msg= "Product Not Added. Try Again.....";
                    mysqli_close($con);
                }
            else{
                $msg="Error in adding the product!!!!";
            }
            }
        }
        else{
            $msg= "File is Corrupted !!!!!";
        }
    }
?>
<html>
    <head>
        <title></title>
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
                <form method="post" enctype="multipart/form-data">
            <table class="container">
                <tr>
                    <th colspan="2" align="center">Add New Product</th>   
                </tr>
                <tr>
                    <td colspan="2"><hr width="400px" align ="center" size="5px" color="brown"></td>
                </tr>
                <tr>
                    <td><label>Product Id</label></td>
                    <td><input type="txt" name="txt_pid" required oninvalid="this.setCustomValidity('Product ID cannot be blank!!!!')" oninput="this.setCustomValidity('')"id="pid"/> </td>
                </tr>
                <tr>
                    <td><label>Product Name</label></td>
                    <td><input type="txt" name="txt_pname"required oninvalid="this.setCustomValidity('Product Name cannot be blank!!!!')" oninput="this.setCustomValidity('')" id="pname"/> </td>
                </tr>
                <tr>
                    <td><label>Product Type</label></td>
                    <td style="align-content: center"><input type="radio" name="ptype" value="Television" />Television
                        <input type="radio" name="ptype" value="Mobile" required oninvalid="this.setCustomValidity(Type cannot be blank!!!!')" oninput="this.setCustomValidity('')" id="ptype" />Mobile
                        </td>
                </tr>
                <tr>
                    <td><label>Product Price </label></td>
                    <td><input type="txt" name="txt_price"required oninvalid="this.setCustomValidity('Price cannot be blank!!!!')" oninput="this.setCustomValidity('')" id="pprice"/> </td>
                </tr>
                <tr>
                    <td><label>Product Image</label></td>
                    <td><input type="file" name="pimage" required oninvalid="this.setCustomValidity('Image cannot be blank!!!!')" oninput="this.setCustomValidity('')" id="pimage"> </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" ><input class="btn" type="submit" name="add_product" value="Add product" /></td>
                </tr>
                <tr>
                    <td>
                    <?php
                    echo $msg;
                    ?></td>
                </tr>
            </table>
                </form>
            </div>
                 <div class="rightpanel"style="margin-left:600px" >
                  
                    <img src="images/add product.jpg" width="400px" heigth="700px" />
                </div>
            
        </main>
        <?php include './footer.php'?>
        
    </body>
</html>