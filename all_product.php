<!DOCTYPE>
<?php
session_start();
include("function/function.php");
 ?>

<html>
  <head>
      <title> My Restaurant </title>
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
          <input type="text" name="user_query" size="20" placeholder="Food Name " />
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
        <!-- add item into cart -->
        <?php cart(); ?>

        <div id="shopping_cart">
            <span style="float:left; font-size:16px; padding:5px; line-height:30px;">
              <?php
              if(isset($_SESSION['user_email'])){
                  $u_email = $_SESSION['user_email'];
                  $get_user = "select * from user where user_email = '$u_email'";
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
              if(!isset($_SESSION['user_email'])){
                echo "<a href='user_login.php' style='color:blue; font-family:Comic Sans MS'> <b>  Login/Register</b></a>";
              }
              else{
                echo "<a href='logout.php' style='color:blue; font-family:Comic Sans MS'> <b>  Logout</b></a>";
              }
               ?>
             </span>
          </div>

          <div class="products_box">
            <h3 style="color:DarkGreen"> All Meals</h3>
              <?php
              $get_pro = "select * from menu";
              $run_pro = mysqli_query ($con, $get_pro);
              while ($row_pro=mysqli_fetch_array($run_pro)){

                $pro_id = $row_pro ['food_id'];
                $pro_title = $row_pro ['food_name'];
                $pro_image = $row_pro ['food_image'];
                $pro_price = $row_pro ['food_price'];
                $pro_cat = $row_pro ['food_cat'];

                echo "
                <div id= 'single_product'>
                  <img src='admin/product_image/$pro_image'width='150'height='180' />
                   <a href='details.php?pro_id=$pro_id'> <p>$pro_title</p></a>
                  <p><b> RM $pro_price </b></p>
                  <a href='index.php?add_cart=$pro_id'><button style ='float:center;' > Add to Cart</button></a>
                </div>";
              }
              ?>
          </div>

          <a href='index.php?pro_id=$pro_id' style ="float:right; padding-right:10px;"> back</a>
       </div>
    <!--Contain wrapper ends here-->



    <div id="footer">
      <h3 style = "text-align:center; padding-top:10px">&copy;2017 Online Restaurant </h3>
    </div>

  </div>
  <!--Main Container ends here-->



</body>






</html>


