<!DOCTYPE html>
<html>
<head>

</head>
<body>

<table width="790" align="center" bgcolor="PaleGreen">

<tr align="center">
  <td colspan="6"><h1 style="color:DarkGreen">View All Products Here</h1></td>
</tr>


  <tr align="center" style="font-size:24" bgcolor="Green" >
    <th>No.</th>
    <th>Title</th>
    <th>Image</th>
    <th>Price(RM)</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>



<?php
include("include/db.php");
$get_pro = "select * from menu";
$run_pro = mysqli_query($con, $get_pro);

$i = 0;

while ($row_pro = mysqli_fetch_array($run_pro)){

  $pro_id = $row_pro['food_id'];
  $pro_title = $row_pro['food_name'];
  $pro_image = $row_pro['food_image'];
  $pro_price = $row_pro['food_price'];
  $i++;

 ?>

<tr align="center" style="font-size:20">
  <td><?php echo $i;?></td>
  <td><?php echo $pro_title;?></td>
  <td><img src="product_image/<?php echo $pro_image;?>" width="60" height="60"/></td>
  <td><?php echo $pro_price;?></td>
  <td><a href="index.php?edit_pro=<?php echo $pro_id;?>">Edit</a></td>
  <td><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>
</tr>

<?php } ?>



</table>
<br>
<td><button><a href="index.php" style="text-decoration:none;">Back</a></button></td>
<br><br><br><br></br>

<?php
include("include/db.php");
if(isset($_GET['delete_pro'])){
  echo "<script>window.open('delete_pro','_self')</script>";
}
  ?>

</body>
</html>
