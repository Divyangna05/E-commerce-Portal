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
?>
<html>
    <head>
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
            <div class="rightpanel" >
                
            </div>
            
        </main>
        <?php include './footer.php'?>
    </body>
</html>