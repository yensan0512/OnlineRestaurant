<!DOCTYPE>
<?php
session_start();
  include("include/db.php");
//   if(isset($_SESSION['user_email'])){
//   $user = $_SESSION ['user_email'];
// }
?>
<html>
  <head>
      <link rel="stylesheet" href="style/style.css" media="all" />

<body>

  <div class="main_wrapper">

    <div class="header_wrapper">
      <img src="../image/cover.jpg" style="width:1000px;height:200px">
    </div>

    <hr>


    <?php
    $t=time();
    $tt= (date("Y-m-d",$t));
    if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $get_order = "select * from orders where order_id='$order_id'";
    $run_detail = mysqli_query ($con,$get_order);
    $row_detail = mysqli_fetch_array($run_detail);

    $order_id = $row_detail['order_id'];
    $order_reference = $row_detail['order_reference'];
    $c_id = $row_detail ['user_id'];
    $name = $row_detail ['customer_name'];
    $email = $row_detail ['customer_email'];
    $address = $row_detail ['customer_add'];
    $state = $row_detail ['customer_state'];
    $contact = $row_detail ['customer_tel'];


    echo "
   <h3 style='float:right;color:Aqua;'>Order ID:  $order_id </h3>

    <h3 style='color:Aqua'>Shipping address:</h3>
    <h3 style='float:right;color:Aqua;'>Order reference:  $order_reference </h3>

    <h3 style='color:Aqua'><b>$name ($email)</b></h3>
    <h3 style='float:right;color:Aqua;'>Date: $tt </h3>
    <h3 style='color:Aqua'>$address, </h3>
    <h3 style='color:Aqua'>$state, Malaysia.</h3>
    <br>
    <h3 style='color:Aqua'>Contact: 0$contact</h3>";

}  ?>


    <hr>


<table width="1000" align="center" border="2" cellpadding="1" cellspacing="1" bgcolor="LavenderBlush">
<tr align="center">
  <td colspan="6"><h2>Order Details</h2></td>
</tr>

<div >
  <tr align="center" bgcolor="#ffccff">
    <th>No.</th>
    <th>Product</th>
    <th>Quantity</th>
    <th>Single Price</th>
    <th>Total Prices</th>
  </tr>
</div>




        <?php
        include("include/db.php");
        $total=0;
        $i = 0;
        $promotion_price = 0;
        $discount_price = 0;
        $orderID = $order_id;
        $get_summary = "select * from ordersdetail where order_id='$orderID'";
        $run_summary= mysqli_query($con, $get_summary);
            while ($row_summary = mysqli_fetch_array($run_summary)){
            $pro_id = $row_summary['pro_id'];
            $pro_name = $row_summary['pro_name'];
            $pro_qty = $row_summary['quantity'];
            $price = $row_summary['price'];


            $get_pro = "select * from menu where food_id = '$pro_id'";
            $run_pro = mysqli_query ($con, $get_pro);

            while ($row_pro = mysqli_fetch_array($run_pro)){

              $food_price = array ($row_pro ['food_price']); //put price into $food_price
              $food_name = $row_pro ['food_name'];
              $food_image = $row_pro ['food_image'];
              $single_price = $row_pro ['food_price'];
              $foods_price = $single_price * $pro_qty;
              $values = array_sum ($food_price);
              $total += $foods_price;
              $discount_price = $total * .10;
              $promotion_price = $total - $discount_price;
              $i++;
            ?>

            <tr align="center">
             <td><?php echo $i;?></td>
           <td><input type="hidden" name="update[]" value="<?php echo $pro_id;?>"/><?php echo $food_name; ?><br><img src="../admin/product_image/<?php echo $food_image;?>" width="60" height="60"/>
           </td>
           <td><?php echo $pro_qty;?></td>
           <td><?php echo "RM " . $single_price; ?></td>
           <td><?php echo "RM " . $foods_price; ?>0</td>
           </tr>


            <?php }} ?>

            <tr align="right">
           <td colspan="4"><b>Sub Total:</b></td>
           <td><?php echo "RM ". $total;?>0</td>
           </tr>

           <tr align="right">
           <td colspan="4"><b>Discount(10%):</b></td>
           <td><?php echo "RM ". $discount_price;?></td>
           </tr>

           <tr align="right">
           <td colspan="4"><b>Promotion Price(10%):</b></td>
           <td><?php echo "RM ". $promotion_price;?></td>
           </tr>





      </table>
      <hr>

      <!-- <tr align="center">
        <td colspan="2"><input type="submit" name="back" value="HOME" /></td>
      </tr> -->

<button><a href='index.php?view_orders' style='float:right;'> Go Back </a></button>
 <center><i>Thanks for your visit. Please Come Again.<i><center>

 <center ><button onclick="myFunction()" class="print">Print</button><center>
<script>
 function myFunction() {
 window.print();
 }
 </script>

 <br><br>
 <br><br>
 <br><br>
 <br></br>


  </div>



</body>
  </html>
