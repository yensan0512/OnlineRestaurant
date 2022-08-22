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
                <!-- display categories -->
                  <?php getCat(); ?>
              </ul>
        </div>

      <div id="content_area">
        <!-- add item into cart -->


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

            <br>
            <table width ="750" align="center" bgcolor="DeepPink">

              <tr align="center">
                <td colspan="10"><h1><b>Contact Us</b></h1></td>
              </tr>
            </table>


            <table width ="750" height="100" align="center" bgcolor="HotPink">
              <tr align="center">
                <td><h3 style="font-family:Times New Roman,Times,Serif">Email: yensan@gmail.com</h3></td>
              </tr>

              <tr align="center">
                <td><h3 style="font-family:Times New Roman,Times,Serif">Phone: 011-39594318</h3></td>
              </tr>

            </table><br></br>
			
			<table>
			<table width ="750" height="100" align="left" >
			<tr align="left">
			<td><h2>Our Vision</h2></td> </tr>
			<tr align="left">
             <td><h4>Love Buddies: To serve customer in the perfect way.</h4></td> </tr>
			 </table>
			 
			 <table>
			 <table width ="750" height="100" align="left" >
            <tr align="left">
            <td><h2>Our Ambition</h2></td> </tr>
			<tr align="left">
             <td><h4>By 1st of January 2020, We Will Be: </h4></td> </tr>
			 <tr align="left">
             <td><h4> 1. Employer of Choice </h4></td> </tr>
			 <tr align="left">
             <td><h4> 2. Leader In Customer Brand Loyalty </h4></td> </tr>
			 <tr align="left">
              <td><h4>3. No.1 In Western Food </h4></td> </tr>
			 
</table>


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
