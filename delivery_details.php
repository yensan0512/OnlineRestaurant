<!DOCTYPE>
<?php
  include("include/db.php");

?>


<?php

$total = 0;
$get_id = "select * from orders ORDER BY order_id DESC LIMIT 0,1";
$run_id = mysqli_query ($con,$get_id);
$row_id = mysqli_fetch_array($run_id);

$order_id = $row_id['order_id'];

$sel_price = "select * from cart";
$run_price = mysqli_query($con,$sel_price);

while ($p_price = mysqli_fetch_array($run_price)){

  $pro_id = $p_price ['product_id']; //from cart table
  $pro_qty = $p_price ['qty']; // from cart table

  //declare data from menu table
  $pro_price = "select * from menu where food_id = '$pro_id'";
  $run_pro_price = mysqli_query ($con, $pro_price);

  while ($pp_price = mysqli_fetch_array($run_pro_price)){

    $food_price = array ($pp_price ['food_price']); //put price into $food_price
    $food_name = $pp_price ['food_name'];
    $food_image = $pp_price ['food_image'];
    $single_price = $pp_price ['food_price'];
    $foods_price = $single_price * $pro_qty;
    $values = array_sum ($food_price);
    $total += $foods_price;
    $discount_price = $total * .10;
    $promotion_price = $total - $discount_price;


$delivery_details = "insert into ordersdetail (pro_id,pro_name,price,quantity,order_id,status) values
('$pro_id','$food_name','$foods_price','$pro_qty','$order_id','InProcess')";
$insert_detailss = mysqli_query($con,$delivery_details);
if($insert_detailss){

  $delete_cart="DELETE FROM cart";
  $run_delete=mysqli_query($con,$delete_cart);
      echo"<script>alert('Order confimed!')</script>";
        echo "<script>window.open('order.php','_self')</script>";
  }

?>

<?php }} ?>
