<?php

require_once("dbcontroller.php");

if(isset($_SESSION['username'])){
  
  $username=$_SESSION['username'];
  $result=mysqli_query($con,"SELECT sum(pQty) as totalproducts from cart where username='$username'");
  $data=mysqli_fetch_assoc($result);
  $totalproducts=$data['totalproducts'];
  if($totalproducts==NULL){
    $cart_count=0;
  }
  else{
    $cart_count=$totalproducts;
  }
 
}
else{
  if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    }
    else{
      $cart_count=0;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        
        <link rel="stylesheet" href="style1.css">
        
        
        <title>Utkal Supermarket</title>
        <style>
    .cart-div{
		margin-right:30px
	}
  .cart-div .badge {
  position: absolute;
  
  top: 4px;
  right: 25px;
  padding: 5px 10px;
  border-radius: 50%;
  font-size: 10px;
  background-color: red;
  color: white;
}
  
  
  .my-cart-icon-affix {
    
    z-index: 1000;
  }
  a
  {
    color:whitesmoke
  }
  a.logout{
    margin-left: 20px;
  }

  
  </style>
   <script>
      function searchFunction() {

var input, filter, products, pname, i;
input = document.getElementById("searchInput");
filter = input.value.toUpperCase();

products = $(".box");
console.log(products.length);
for (i = 0; i < products.length; i++) {
    pname = products[i].getAttribute('data-content');
    document.write(pname);
    if (pname) {
        if (pname.toUpperCase().indexOf(filter) > -1) {
            products[i].style.display = "";
        } else {
            products[i].style.display = "none";
        }
    }
}
      </script>
    </head>
    
<body>
    <table border="0" width="100%" height="60px">
        <tr>
            <td align="right"><h1>Utkal Supermarket</h1></td>
            <td class="search-bar">
            <form >
            <input type="text" id="searchInput" name="searchInput" onkeyup="searchFunction()" placeholder="Search for products, brands and more" style="width: 550px;height: 25px;">
            <input type="submit" name="search" value="Search"  class="search-button" style="height: 25px;"></td>
            </form>
           
           
            <th class="signin">
              <font color="white" size="3px">
                <?php 
                  if(isset($_SESSION['username'])){
                    echo "<div>
                    <i class='fa fa-user' aria-hidden='true'></i> ".$_SESSION['username']." <a href='logout.php' class='logout'>Logout</a>
                      </div>";
                  }
                  else{
                    echo " <div>
                    <a href='login.php' class='loginlink'><i class='fa fa-user' aria-hidden='true'></i> Login/Signup</a>
                  </div>";
                  }
                ?>
               
              
            </font></th>
            <th class="cart"><font color="white" size="5px">
              <div class="cart-div">
              <span style="font-size:35px"><a href="cart.php" class="cartlink"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></span>
              <span class="badge badge-notify my-cart-badge"><?php echo $cart_count; ?></span>
              </div>

             </font></th>
           
        </tr>
    </table>
    <div class="navbar">
        
        <div class="dropdown">
            <button class="dropbtn">Fruits & Vegetables 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
             <ul>
            <li><li><a href="fruits.php">Fresh Fruits</a></li></li>
            <li><li><a href="vegetables.php">Fresh Vegetables</a></li></li>
            <li><li><a href="herbs.php">Herbs & Seasionings</a></li></li>
            <li><li><a href="exotic-fruits-vegetables.php">Exotic Fruits & Vegetables</a></li></li>
             </ul>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Dairy & Bakery 
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <ul>
                <li><a href="dairy.php">Dairy</a></li>
                <li><a href="toast-khari.php">Toast & Khari</a></li>
                <li><a href="cakes-muffins.php">Cakes & Muffins</a></li>
                <li><a href="breads-and-buns.php">Breads and Buns</a></li>
                <li><a href="baked-cookies.php">Baked Cookies</a></li>
                <li><a href="bakery-snacks.php">Bakery Snacks</a></li>
                <li><a href="batter-chutney.php">Batter & Chutney</a></li>
                <li><a href="cheese.php">Cheese</a></li>
                <li><a href="ghee.php">Ghee</a></li>
                <li><a href="paneer-tofu.php">Paneer & Tofu</a></li>
              </ul>
                </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Staples
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <ul>
            <li><a href="staples_01.php">Atta, Flour & Sooji</a></li>
            <li><a href="staples_02.php">Dals & Pulses</a></li>
            <li><a href="staples_03.php">Rice & Rice Products</a></li>
            <li><a href="staples_04.php">Edible Oils</a></li>
            <li><a href="staples_05.php">Masalas & Spices</a></li>
            <li><a href="staples_06.php">Salt, Sugar & Jaggery</a></li>
            <li><a href="staples_07.php">Soya Products, Wheat & Other Grains</a></li>
            <li><a href="staples_08.php">Dry Fruits & Nuts</a></li>
            </ul>
            </div>
        </div>
       
        <div class="dropdown">
            <button class="dropbtn">Snacks & Branded Foods
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <ul>
                <li><a href="biscut_cookies.php">Biscuits & Cookies</a></li>
                <li><a href="noodles_pasta.php">Noodle, Pasta, Vermicelli</a></li>
                <li><a href="breakfast_cereals.php">Breakfast Cereals</a></li>
                <li><a href="snacks_namkeen.php">Snacks & Namkeen</a></li>
                <li><a href="chocolate_candies.php">Chocolates & Candies</a></li>
                <li><a href="ready_to_cook_eat.php">Ready To Cook & Eat</a></li>
                <li><a href="frozen_veggies_snacks.php">Frozen Veggies & Snacks</a></li>
                <li><a href="spreads_sauces_ketchups.php">Spreads, Sauces, Ketchup</a></li>
                <li><a href="indian_sweets.php">Indian Sweets</a></li>
                <li><a href="pickels_chutney.php">Pickles & Chutney</a></li>
            </ul>
            </div>
        </div>
      </div>
      </div> 
      </div>
</body>

 
</html>