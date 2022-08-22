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
        <li><a href="all_products.php">All Meals</a></li>
        <li><a href="best_seller.php">Hot Meals</a></li>
        <li><a href="new_release.php">New Release</a></li>
        <li><a href="customer/my_account.php">My Account</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>

      <div id="form">
        <form method="get" action="results.php" enctype="multipart/form-data">
          <input type="text" name="user_query" size="20" placeholder="Food Name" />
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


        <form action="user_register.php" method="post" enctype="multipart/form-data">

          <table width ="750" height="500" align="center" border="2" bgcolor="Yellow">

              <tr align="center">
                <td colspan="10"><h2>Registration Form </h2></td>
              </tr>

              <tr>
                <td align="right"><b>Name:</b></td>
                <td><input type="text" name="u_name" pattern="[A-Za-z\s,.]{0,50}" size="40" placeholder="Name cannot contains number" required</td>
              </tr>

              <tr>
                <td align="right"><b>Email:</b></td>
                <td><input type="email" name="u_email" size="40" placeholder="abc@gmail.com" required/></td>
              </tr>

              <tr>
                <td align="right"><b>Password:</b></td>
                <td><input type="password" name="u_password" minlength="6" placeholder="minimum is 6 character" required/></td>
              </tr>

              <tr>
                <td align="right"><b>Comfirm Password:</b></td>
                <td><input type="password" name="u_password2" minlength="6" placeholder="minimum is 6 character" required/></td>
              </tr>

              <tr>
                <td align="right"><b>Address:</b></td>
                <td><textarea name="u_address" cols="20" rows="5" placeholder="House no ? Street ?" required></textarea></td>
              </tr>

              <tr>
                <td align="right"><b>State:</b></td>
                <td>
                  <select name="u_state">
                    <option>Select a state</option>
                    <option>Perlis</option>
                    <option>Kedah</option>
                    <option>Selangor</option>
                    <option>Kuala Lumpur</option>
                    <option>Johor</option>
                    <option>Pahang</option>
                    <option>Perak</option>
                    <option>Penang</option>
                    <option>Negeri Sembilan</option>
                    <option>Malacca</option>
                    <option>Terengganu</option>
                    <option>Kelantan</option>
                    <option>Sabah</option>
                    <option>Sarawak</option>

                  </select>
                </td>
              </tr>

              <tr>
                <td align="right"><b>Contact:</b></td>
                <td><input type="text" name="u_contact" placeholder="Eg:01xxxxxxxx" pattern="[0]{1}[1]{1}[0-9]{8,9}" required /></td>
              </tr>


              <tr>
                <td align="right"><b>Image:</b></td>
                <td><input type="file" name="u_image" /></td>
              </tr>



              <tr align="center">
                <td colspan="10"><input type="submit" name="register" value="Create Account" /></td>
              </tr>

            </table>



        </form>

        <br><br>
<td colspan="2"><button><a href="index.php" style="text-decoration:none;">Back</a></button></td>


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

<?php
  if(isset($_POST['register'])){

    $u_name = $_POST['u_name'];
    $u_email = $_POST['u_email'];
    $u_password = $_POST['u_password'];
    $u_password2 = $_POST['u_password2'];
    $u_address = $_POST['u_address'];
    $u_state = $_POST['u_state'];
    $u_contact = $_POST['u_contact'];
    $u_image = $_FILES['u_image']['name'];
    $u_image_tmp = $_FILES['u_image']['tmp_name'];

    if(move_uploaded_file($u_image_tmp,"customer/image/$u_image")){
		if(mysqli_num_rows($run_u) ==0){
		
			if($u_password==$u_password2){
				
				$insert_u = "insert into user (user_name,user_email,user_pass,user_pass2,user_address,user_state,user_contact,user_image,question_id,answer,isAdmin)
				values ('$u_name','$u_email','$u_password','$u_password2','$u_address','$u_state','$u_contact','$u_image',0,0,0)";
				
				$run_u = mysqli_query($con,$insert_u);

				$sel_cart = "select * from cart ";

				$run_cart = mysqli_query ($con, $sel_cart);

				$check_cart = mysqli_num_rows($run_cart);

				if($check_cart==0){
				  $_SESSION['user_email'] = $u_email;
				  echo "<script>alert('Registration successful!')</script>";
				  echo "<script>window.open('customer/my_account.php','_self')</script>";

				}

				else{
				  $_SESSION['user_email'] = $u_email;
				  echo "<script>alert('Registration successful!')</script>";
				  echo "<script>window.open('cart.php','_self')</script>";
				}
			}
			else{
				echo"<script>alert('The password are not confirmed!')</script>";
			}
		}

		else {
			echo"<script>alert('The user email has been registred!')</script>";
		}
	}

	else
		echo "<script>alert('fail')</script>";

    $insert_u = "select user_email from user where user_email = '$u_email'";
    $run_u = mysqli_query($con,$insert_u);

    

}


 ?>
