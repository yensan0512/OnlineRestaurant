<!DOCTYPE>
<?php
session_start();
include("function/function.php");
 ?>

<html>
  <head>
      <title> My Restaurant </title>
      <link rel="stylesheet" href="../style/style.css" media="all" />
  </head>

<body>

  <!--Main Container starts here-->
  <div class="main_wrapper">

    <!--Header starts here-->
    <div class="header_wrapper">

        <a href="../index.php"><img src="image/cover.jpg" style="width:1000px;height:200px;">

  </div>
    <!--Header ends here-->

    <!--Navagation Bar starts here-->
    <div class="menubar">
      <ul id="menu">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../all_product.php">All Meals</a></li>
        <li><a href="../best_seller.php">Hot Meals</a></li>
        <li><a href="../new_release.php">New Release</a></li>
        <li><a href="my_account.php">My Account</a></li>
        <li><a href="../cart.php">Cart</a></li>
        <li><a href="../contact.php">Contact Us</a></li>
      </ul>

      <div id="form">
        <form method="get" action="../results.php" enctype="multipart/form-data">
          <input type="text" name="user_query" size="20" placeholder="Food Name " />
          <input type="submit" name="search" value="Search" />
        </form>
      </div>


      </div>
    <!--Navagation Bar ends here-->

    <!--Contain wrapper starts here-->
    <div class="content_wrapper">

      <div id="sidebar" >
          <div id="sidebar_title">My account</div>


              <ul id="cats">

                <?php
                if(isset($_SESSION['user_email'])){

                $user = $_SESSION ['user_email'];
                $get_img = "select * from user where user_email='$user'";
                $run_img = mysqli_query ($con,$get_img);
                $row_img = mysqli_fetch_array($run_img);
                $u_image = $row_img['user_image'];
                $u_name = $row_img['user_name'];

                 echo "<p style='text-align:center;'><img src='image/$u_image' width = '150' height='150' border='2px solid black' />";

                }

                else{
                echo "<script>alert('Log in to view My Account!')</script>";
                echo "<script>window.open('../user_login.php','_self')</script>";
                }
                ?>


                <li><a href="my_account.php?my_orders">My Orders</a></li>
                <li><a href="my_account.php?edit_image">Edit Profile Image</a></li>
                <li><a href="my_account.php?edit_account">Edit Account</a></li>
                <li><a href="my_account.php?change_pass">Change Password</a></li>
                <li><a href="my_account.php?delete_account">Delete Account</a></li>
                <li><a href="../logout.php">Logout</a></li>
              </ul>


        </div>

      <div id="content_area">

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

            <a href="cart.php"><img src="../image/cart.png" style="width:50px;height:35px; padding-right:10; float:right"></a>

            <span style="float:right; font-size:16px; padding:5px; line-height:30px;">
              <?php
              if(!isset($_SESSION['user_email'])){
                echo "<a href='user_login.php' style='color:blue; font-family:Comic Sans MS'> <b>  Login/Register</b></a>";
              }
              else{
                echo "<a href='../logout.php' style='color:blue; font-family:Comic Sans MS'> <b>  Logout</b></a>";
              }
               ?>
             </span>
          </div>


          <div class="products_box">


            <?php
            if(!isset($_GET['my_orders'])){
              if(!isset($_GET['edit_account'])){
              if(!isset($_GET['edit_image'])){
                if(!isset($_GET['change_pass'])){
                  if(!isset($_GET['delete_account'])){

            echo "
              <h2 style='padding:10px; text-align:center;'>Welcome: $u_name</h2>
            <h3 style='text-align:center;'> You can view your order progress by clicking this <a href='my_account.php?my_orders'>link</a></h3>";
            }
          }
        }
      }
    }
             ?>

             <?php
             if(isset($_GET['edit_account'])){
               include("edit_account.php");
             }

             if(isset($_GET['edit_image'])){
               include("edit_image.php");
             }

             if(isset($_GET['change_pass'])){
               include("change_pass.php");
             }

             if(isset($_GET['delete_account'])){
               include("delete_account.php");
             }

             if(isset($_GET['my_orders'])){
               include("my_orders.php");
             }
              ?>



          </div>

       </div>
    <!--Contain wrapper ends here-->



    <div id="footer">
      <h3 style = "text-align:center; padding-top:10px">&copy;2017 Online Restaurant </h3>
    </div>
  </div>
  <!--Main Container ends here-->

</body>
</html>
