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
          <input type="text" name="user_query" size="20" placeholder="Book Title or Author " />
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
           <div class="container">
		  <form method="post" action="">
          <label><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
			<input type="submit" name="submit" value="Submit" /></td>
       

			</form>
			</div>
		  <?php
		  if(isset($_POST['submit'])){

		  $email=$_POST['email'];
         
          $status = "OK";
          $msg="";
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
// You can supress the error message by un commenting the above line
if (!stristr($email,"@") OR !stristr($email,".")) {
$msg="Your email address is not correct<BR>"; 
$status= "NOTOK";}


echo "<br><br>";
if($status=="OK"){ // validation passed now we will check the tables
$query="SELECT user_email,user_id,user_pass FROM user WHERE user_email = '$email'";

$st=mysqli_query($con,$query);
$recs=mysqli_num_rows($st);
$row=mysqli_fetch_object($st);
if ($recs>0)
	$em=$row->user_email;// email is stored to a variable
if ($recs == 0) { // No records returned, so no email address in our table
// let us show the error message
echo "<center><font face='Verdana' size='2' color=red><b>No Password</b><br>
Sorry Your address is not there in our database . You can signup and login to use our site. 
<BR><BR><a href='signup.php'> Sign UP </a> </center>"; 
exit;}

// formating the mail posting
// headers here 
$headers = 'MIME-Version:1.0';
$headers4="kasster007@gmail.com"; // Change this address within quotes to your address
$headers .="Reply-to:$headers4\n";
$headers .="From: $headers4\n"; 
$headers .="Errors-to:$headers4\n"; 
$headers= "Content-Type: text/html; charset=iso-8859-1\n".$headers;// for html mail 

// mail funciton will return true if it is successful
if(mail("$em","Your Request for login details","This is in response to your request for login detailst at
site_name \n \nLogin ID: $row->user_id \n 
Password: $row->user_pass \n\n Thank You \n \n siteadmin","$headers"))
{echo "<center><b>THANK YOU</b> <br>Your password is posted to your emil address . 
Please check your mail after some time. </center>";}

else{// there is a system problem in sending mail
echo " <center>There is some system problem in sending login details to your address. 
Please contact site-admin. <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center>";}
} 

else {// Validation failed so show the error message
echo "<center>$msg 
<br><br><input type='button' value='Retry' onClick='history.go(-1)'></center>";}
		  }
?>