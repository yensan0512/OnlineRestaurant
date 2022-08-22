<!DOCTYPE html>
<html>
<head>

</head>
<body>

<table width="780" align="center" bgcolor="PaleGreen">





<tr align="center" >
  <td colspan="7" ><h1 style="font-family:Times New Roman,Times,Serif; color:DarkGreen;">View All Orders Here</h1></td>
</tr>

<div >
  <tr align="center" style="font-size:24" bgcolor="Green" >
    <th>ID</th>
    <th>Order Reference</th>
    <th>Date</th>
    <th>Price</th>
    <th>Status</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</div>


<?php
include("include/db.php");
$get_pro = "select * from orders order by date desc";
$run_pro = mysqli_query($con, $get_pro);

$i = 0;

while ($row_pro = mysqli_fetch_array($run_pro)){
  $date = $row_pro['date'];
  $order_id = $row_pro['order_id'];
  $order_reference = $row_pro['order_reference'];
  $promotion_price = $row_pro['promotion_price'];

  $get_proo = "select * from ordersdetail where order_id='$order_id'";
  $run_proo = mysqli_query($con, $get_proo);
  $row_proo = mysqli_fetch_array($run_proo);
  $status = $row_proo['status'];


 ?>

<tr align="center" style="font-size:20">
  <td><?php echo $order_id;?></td>

  <td><a href="view_orderdetails.php?order_id=<?php echo $order_id;?>"> <?php echo $order_reference;?></a></td>
  <td><?php echo $date;?></td>
  <td>RM<?php echo $promotion_price;?></td>
  <td><?php echo $status;?></td>
  <td><a href="index.php?edit_order=<?php echo $order_id;?>">Edit</a></td>
    <td><a href="delete_order.php?delete_order=<?php echo $order_id;?>">Delete</a></td>
</tr>

<?php } ?>



</table>

<br>
<td><button><a href="index.php" style="text-decoration:none;">Back</a></button></td>
<br><br><br><br></br>

<?php
include("include/db.php");
if(isset($_GET['delete_order'])){
  echo "<script>window.open('delete_order','_self')</script>";
}
  ?>

</body>
</html>
