<?php
    session_start();
    require_once("dbcontroller.php");
    if(isset($_SESSION['username']))
    {
        $username=$_SESSION['username'];
        $sql="delete from cart where username='$username'";
        if(mysqli_query($con,$sql)){
          header("Location:cart.php"); 
        }
    }
    else{
        if(!empty($_SESSION['shopping_cart']))
        {
        unset($_SESSION['shopping_cart']);
        session_destroy();
        header("Location:cart.php");
         }
    }
    
 ?>