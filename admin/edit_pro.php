<!DOCTYPE>
<?php
include("include/db.php");
if(isset($_GET['edit_pro'])){
  $get_id = $_GET['edit_pro'];
  $get_pro = "select * from menu where food_id='$get_id'";
  $run_pro = mysqli_query($con, $get_pro);

//  $i = 0;

  $row_pro = mysqli_fetch_array($run_pro);

    $pro_id = $row_pro['food_id'];
    $pro_title = $row_pro['food_name'];
    $pro_image = $row_pro['food_image'];
    $pro_price = $row_pro['food_price'];
    $pro_publishedDate = $row_pro['published_date'];
    $pro_des = $row_pro['food_detail'];
    $pro_cats = $row_pro['food_cat'];

    $get_cat = "select * from category where cat_id = '$pro_cats'";
    $run_get = mysqli_query($con, $get_cat);
    $row_cat = mysqli_fetch_array($run_get);
    $cat_name = $row_cat ['cat_name'];
}
?>


<html>
  <head>
    <title>Inserting Product</title>

  </head>

<body bgcolor="skyblue">

  <form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="790" border="2" bgcolor="SpringGreen" >

        <tr align="center">
          <td colspan="10"><h2>Edit and Update Product</h2></td>
        </tr>

        <tr>
          <td align="right"><b>Product Name:</b></td>
          <td><input type="text" name="product_title" size="50" value="<?php echo $pro_title;?>" required/></td>
        </tr>

        <tr>
          <td align="right"><b>Product Price:</b></td>
          <td><input type="text" name="product_price" value="<?php echo $pro_price;?>" pattern="[0-9.]{1,6}" required /></td>
        </tr>

        <tr>
          <td align="right"><b>Product Description:</b></td>
          <td><input type="text" name="product_description" size ="60"  value="<?php echo $pro_des;?>" /></td>
        </tr>

        <tr>
          <td align="right"><b>Product Category:</b></td>
          <td>
            <select name="product_cat">
              <option><?php echo$pro_cats;?></option>
              <?php

              $get_cat = "select * from category";
              $run_cat = mysqli_query($con, $get_cat);

              while ($row_cat = mysqli_fetch_array ($run_cat)){

                $cat_id = $row_cat['cat_id'];
                $cat_name = $row_cat['cat_name'];


              echo "<option value='$cat_name'>$cat_name</option>";

              }

               ?>
            </select>

          </td>
        </tr>

        <tr>
          <td align="right"><b>Product Published Date:</b></td>
          <td><input type="date" name="product_publishedDate" min="1900-01-01" value="<?php echo $pro_publishedDate;?>" /></td>
        </tr>

        <tr align="center">
          <td colspan="10"><input type="submit" name="update_product" value="Update Product" /></td>
        </tr>

      </table>

<br></br>

      <table align="center" width="790" border="2" bgcolor="SpringGreen" >
        <tr>
          <td align="right"><b>Product Image:</b></td>
          <td><input type="file" name="product_image" /><img src="product_image/<?php echo $pro_image; ?>" width="60" height="60"/></td>
        </tr>

        <tr align="center">
          <td colspan="10"><input type="submit" name="update_pro_image" value="Update Product Image" /></td>
        </tr>

        </table>



</form>
<br>
<td><button><a href="index.php?view_products" style="text-decoration:none;">Back</a></button></td>
<br><br><br><br></br>

</body>
</html>

<?php
  if(isset($_POST['update_pro_image'])){


    //getting the text data from the fields
    $update_id = $pro_id;

    //getting the image from the field
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp,"product_image/$product_image");

    $update_proimage = "update products set food_image='$product_image' where food_id = '$update_id'";

    $run_proimage = mysqli_query($con,$update_proimage);
    if($run_proimage){

      echo "<script>alert('Product image has been updated!')</script>";
      echo "<script>window.open('index.php?view_products','_self')</script>";
    }

  }


  if(isset($_POST['update_product'])){


    //getting the text data from the fields
    $update_id = $pro_id;

    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_cat = $_POST['product_cat'];
    $product_publishedDate = $_POST['product_publishedDate'];


    $update_product = "update products set food_name='$product_title',published_date='$product_publishedDate',food_detail='$product_description',
    food_cat='$product_cat',food_price='$product_price'where food_id = '$update_id'";

    $run_product = mysqli_query($con,$update_product);
    if($run_product){

      echo "<script>alert('Product has been updated!')</script>";
      echo "<script>window.open('index.php?view_products','_self')</script>";
    }

  }




 ?>
