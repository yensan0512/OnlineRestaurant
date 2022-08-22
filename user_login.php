<!DOCTYPE>
<?php
session_start();
include("function/function.php");
include("include/db.php");
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
                <!-- display categories -->
                  <?php getCat(); ?>
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

          <form method="post" action="">

            <table width ="750" height="200" align="center" bgcolor="Yellow">

              <tr align="center">
                <td colspan="10"><h2><b>Login Form </b></h2></td>
              </tr>

              <tr>
                <td align="right"><b>Email:</b></td>
                <td><input name="email" type="email" placeholder="Enter email" size="40" required/></td>
              </tr>

              <tr>
                <td align="right"><b>Password:</b></td>
                <td><input name="pass" type="password" placeholder="Enter password" size="20" required/></td>
              </tr>

              <tr align="right">
                <td colspan="2"><b><a href="admin/index.php" style="padding-right:20; text-decoration:none; color:brown">Admin?</a></b></td>
              </tr>

              <tr align="center">
                <td colspan="2"><input type="submit" name="login" value="Login" /></td>
              </tr>


            </table>
            <h3 style="float:left"><a href="fg.php">Forget password</a><h3><br>
            <h3 style="float:left">Not a member yet? Register <a href="user_register.php">here</a>!<h3></br>

          </form>
          <br><br>
  <td colspan="2"><button><a href="index.php" style="text-decoration:none;">Back</a></button></td>
       </div>

     </div>

    <!--Contain wrapper ends here-->



    <div id="footer">
      <h3 style = "text-align:center; padding-top:10px">&copy;2016 Online Book Store </h3>
    </div>
  </div>
  <!--Main Container ends here-->

</body>
</html>
<?php
if(isset($_POST['login'])){
	$u_email = $_POST['email'];
	$u_pass = $_POST['pass'];

	$sel_u = "select * from user where user_pass ='$u_pass' AND user_email = '$u_email'";
	$run_u = mysqli_query($con, $sel_u);
	$check_user = mysqli_num_rows($run_u);

	if($check_user==0){

	echo"<script>alert('Password or email is incorrect,please try again!')</script>";
	exit();
	}
	//determine is admin or not
	$get_admin = "select isAdmin from user where user_email = '$u_email'";
	$run_admin = mysqli_query($con, $get_admin);
	$u_admin = mysqli_fetch_array($run_admin);
	$isAdmin=$u_admin['isAdmin'];
	
	if(!$isAdmin){
		$sel_cart = "select * from cart";
		$run_cart = mysqli_query ($con, $sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if($check_user>0 AND $check_cart==0){
			$_SESSION['user_email'] = $u_email;
			echo "<script>alert('You logged in successfully!')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}

		else{
			$_SESSION['user_email'] = $u_email;
			echo "<script>alert('You logged in successfully!')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
		}
	}
	else{
		echo "<script>alert('Admin logged in successfully!')</script>";
		echo "<script>window.open('admin/index.php?logged_in=You have successfully Logged in!','_self')</script>";
	}
		

	
}
?>



        </div>
