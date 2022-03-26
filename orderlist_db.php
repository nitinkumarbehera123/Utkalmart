<?php
    require_once("dbcontroller.php");
    $username=$_SESSION['username'];
  //  if (isset($_POST['action']) && $_POST['action']=="remove")
   // {
     //   if (isset($_POST['pid']) && !empty($_POST['pid']))
     //   {
     //       $sql = "DELETE FROM cart WHERE pId='" . $_POST["pid"] . "' and username='$username'";
     //       if(mysqli_query($con,$sql)){
     //           $status = "<div class='box' style='color:red;'>
	//	                Product is removed from your cart!</div>";
    //        }
    //    }
   // }
    $sql="select pId,pName,pQty,pPrice,pImage from orderh where username='$username' ";
    $result=mysqli_query($con,$sql);
    $total_price=0;
?>
<html>
<head>
<title>Shopping Cart </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="cart_style.css">
 
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Shopping Cart</h2>   



<div class="cart">
    <?php
        if(mysqli_num_rows($result)>0)
        {
            ?>
            <table class="table">
             <tbody>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Unit Price</th>
                    <th>Product Total</th>
                </tr>
                <?php
                    while($row=mysqli_fetch_assoc($result))
                    {
                        ?>
                        <tr>
                            <td><img src="<?php echo $row['pImage']; ?>"  width="50" height="40" /></td>
                            <td><?php echo $row['pName']; ?><br />
                                <form method='post' action=''>
                                <input type='hidden' name='pid' value="<?php echo $row['pId']; ?>" />
                                <input type='hidden' name='action' value="remove" />
                                <button type='submit' class='remove'>Remove Item</button>
                                </form></td>
                            <td><?php echo $row['pQty']; ?></td>
                            <td><?php echo $row['pPrice']; ?></td>
                            <td><?php echo $row['pPrice']*$row['pQty']; ?></td>
                        </tr>
                        <?php
                        $total_price += ($row["pPrice"]*$row["pQty"]);
                    }
                    
                ?>
                <tr>
                    <td colspan="5" align="right">
                    <strong>TOTAL: <?php echo '<i class="fas fa-rupee-sign"></i>'.$total_price; ?></strong>
                    </td>
                </tr>
             </tbody>
            </table>
            <?php
        }
        else{
	        echo "<h3>Your cart is empty!</h3>";
	    }
    ?>
</div>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<table>
	<tr>
		<td><a href="index.php" >Continue Shopping</a></td>
	
	</tr>
</table>
</div>
</body>
</html>