<?php
    $productid = $_GET['pid'];
    $ptype= $_GET['type'];
    if(isset($_COOKIE['cart']))
    {
        $data = $_COOKIE['cart'];
        if(!strstr($data,$productid)){
        $data = $data.",".$productid;
        setcookie("cart",$data);
        }
    }
    else{
        setcookie("cart",$productid);
    }
    if($ptype=="Mobile")
        header("location:mobiledesc.php?pid=$productid");
    else
        header("location:televisiondesc.php?pid=$productid");
?>