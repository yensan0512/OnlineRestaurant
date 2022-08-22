<!DOCTYPE>
<?php
session_start();
include("function/function.php");
 ?>
 
 <?php
include("include/db.php");

$user = $_SESSION ['user_email'];
$get_user = "select * from user where user_email='$user'";
$run_user = mysqli_query ($con,$get_user);
$row_user = mysqli_fetch_array($run_user);

$u_id = $row_user['user_id'];
$name = $row_user['user_name'];
$email = $row_user['user_email'];
$address = $row_user['user_address'];
$state = $row_user['user_state'];
$contact = $row_user['user_contact'];


?>

<html>
  <head>
      <title> My Online Restaurant </title>
      <link rel="stylesheet" href="style/style.css" media="all" />
  </head>

<body>

  <!--Main Container starts here-->
  <div class="main_wrapper">

    <!--Header starts here-->
      <div class="header_wrapper">
        <a href="index.php"><img src="image/cover.jpg" style="width:1000px;height:200px">
      </div>
    <!--Header ends here-->

 <!--Navagation Bar starts here-->
      <div class="menubar">
        <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="all_product.php">All Meals</a></li>
          <li><a href="best_seller.php">Hot Meals</a></li>
          <li><a href="new_release.php">New Release</a></li>
          <li><a href="customer/my_account.php">My Account</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>

      <div id="form">
        <form method="get" action="results.php" enctype="multipart/form-data">
          <input type="text" name="user_query" size="20" placeholder=" Food Name " />
          <input type="submit" name="search" value="Search" />
        </form>
      </div>


    </div>
    <!--Navagation Bar ends here-->
 <!--Contain wrapper starts here-->
  <div class="content_wrapper">

        <div id="sidebar" >
            <div id="sidebar_title">Categories</div>
              <ul id="cats">
                  <?php getCat(); ?>
              </ul>
        </div>

      <div id="content_area">

        <div id="shopping_cart">
            <span style="float:left; font-size:16px; padding:5px; line-height:30px;">
              <?php
              if(isset($_SESSION['user_id'])){
                  $u_id = $_SESSION['user_id'];
                  $get_user = "select * from user where user_id = '$u_id'";
                  $run_user = mysqli_query ($con, $get_user);
                  while($row2 = mysqli_fetch_array($run_user)){
                  $u_name= $row2['user_name'];
                  echo"<b>Welcome: </b> <b style='color:blue'>$u_name </b>";
                }
              }
              else{
                echo "<b>Welcome Guest! </b>";
              }
              ?>

              Total Items: <b><?php total_items(); ?> </b>
              Total Price: <b><?php total_price(); ?> </b>
            </span>

            <a href="cart.php"><img src="image/cart.png" style="width:50px;height:35px; padding-right:10; float:right"></a>

            <span style="float:right; font-size:16px; padding:5px; line-height:30px;">
              <?php
              if(!isset($_SESSION['user_id'])){
                echo "<a href='user_login.php' style='color:blue; font-family:Comic Sans MS'> <b>  Login/Register</b></a>";
              }
              else{
                echo "<a href='logout.php' style='color:blue; font-family:Comic Sans MS'> <b>  Logout</b></a>";
              }
               ?>
             </span>
          </div>


          <div class="products_box">
            <br>
            <form action="" method="post" enctype="multipart/form-data">
              <table align="center" width="750" bgcolor="powderblue" >

              <tr align="center">
                <th>Remove</th>
                <th>Products(S)</th>
                <th>Quantity</th>
                <th>Single Price</th>
                <th>Total Price</th>
			
              </tr>

              <?php
			  $remark="";
              $total = 0;
              $promotion_price =0;
              //declare data from cart table
              global $con;
              $sel_price = "select * from cart";
              $run_price = mysqli_query($con,$sel_price);

              while ($p_price = mysqli_fetch_array($run_price)){

                $pro_id = $p_price ['product_id']; //from cart table
                $pro_qty = $p_price ['qty']; // from cart table

                //declare data from menu table
                $pro_price = "select * from menu where food_id = '$pro_id'";
                $run_pro_price = mysqli_query ($con, $pro_price);

                while ($ff_price = mysqli_fetch_array($run_pro_price)){

                  $food_price = array ($ff_price ['food_price']); //put price into $food_price
                  $food_name = $ff_price ['food_name'];
                  $food_image = $ff_price ['food_image'];
                  $single_price = $ff_price ['food_price'];
                  $foods_price = $single_price * $pro_qty;
                  $values = array_sum ($food_price);
                  $total += $foods_price;
                  $discount_price = $total * .10;
                  $promotion_price = $total - $discount_price;
                  ?>


                  <tr align="center">
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
                    <td><input type="hidden" name="update[]" value="<?php echo $pro_id;?>"/><?php echo $food_name; ?><br><img src="admin/product_image/<?php echo $food_image;?>" width="100" height="150"/>
                    </td>
                    <td><input type="number" value="<?php echo $pro_qty;?>" size="4" name="quantity[]" min="1" max="100"/></td>
                    <td><?php echo "RM " . $single_price; ?></td>
                    <td><?php echo "RM " . $foods_price; ?>0</td>
                  </tr>

                  <?php }} ?>

                  <tr align="right">
                    <td colspan="4"><b>Sub Total:</b></td>
                    <td><?php echo "RM ". $total;?>0</td>
                  </tr>

                  <tr align="right">
                    <td colspan="4"><b>Promotion Price(10%):</b></td>
                    <td><?php echo "RM ". $promotion_price;?></td>
                  </tr>
				  
                  <tr align="center">
                    <td ><input type="submit" name="remove_pro" value="Remove"/></td>
                    <td><input type="submit" name="continue" value="Continue Shopping"/></td>
                    <td ><input type="submit" name="update_cart" value="Update quantity"/></td>
                    <td colspan="2"><button name="checkout">Checkout</button></td>
                  </tr>
			
        </table>
		<br></br>
                    <h3 align="left">Remark:<textarea name="remark" rows="5" cols="60"><?php echo $remark;?></textarea></h3>
				
<!-- update quatity -->
<?php

  global $con;

  if (isset($_POST['update_cart'])){

      foreach($_POST['update']as  $key=>$update_id){ //loop for 2 parameter
      $qtyy=$_POST['quantity'][$key];
      $update_product="update cart set qty='$qtyy' where product_id='$update_id'";
      $run_update=mysqli_query($con,$update_product);

      if($run_update){

        echo"<script>alert('Quantity of product is updated successfully!')</script>";
        echo"<script>window.open('cart.php','_self')</script>";
      }
    }
	
  }


  //update the cart(remove)
    //function removecart(){ //changed
      global $con;

      if(isset($_POST['remove_pro'])){
        foreach ($_POST['remove'] as $remove_id) {
          $delete_product = "delete from cart where product_id ='$remove_id' ";
          $run_delete = mysqli_query($con, $delete_product);
          if($run_delete){
            echo "<script>window.open('cart.php','_self')</script>";

          }
        }
      }
	  
	  if (empty($_POST["remark"])) {
		  $remark = "";
		} else {
			$remark = test_input($_POST["remark"]);
		}

      if(isset($_POST['continue'])){
        echo "<script>window.open('index.php','_self')</script>";
      }
	  
	  function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		
	if(isset($_POST['checkout'])){
		
		//reference number is randomed
		$reference=(rand(1000,99999));
		//insert the reference and remark into remark table
		$insert_remark = "insert into remark(user_id,reference,remark) values ('$u_id','$reference','$remark')";
		$run_remark = mysqli_query($con, $insert_remark);
		
		if($run_remark==1)
			echo "<script>window.open('checkout.php','_self')</script>";
		else
			echo "<script>alert('Error!')</script>";
      }
  ?>

        </div>
    </div>


    <!--Contain wrapper ends here-->


    <div id="footer">
      <h3 style = "text-align:center; padding-top:10px">&copy;2017 Online Restaurant</h3>
    </div>

  </div>
  <!--Main Container ends here-->



</body>



</html>

