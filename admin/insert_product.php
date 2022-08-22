<!DOCTYPE>
<?php
include("include/db.php");
?>


<html>
  <head>
    <title>Inserting Product</title>

  </head>

<body bgcolor="skyblue">

  <form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="790" height="500" border="2" bgcolor="PaleGreen" >

        <tr align="center">
          <td colspan="10"><h1 style="color:DarkGreen">Insert New Product Here </h1></td>
        </tr>

        <tr>
          <td align="right"><b>Product Name:</b></td>
          <td><input type="text" name="product_title" size="50" required/></td>
        </tr>
        <tr>
          <td align="right"><b>Product Image:</b></td>
          <td><input type="file" name="product_image" /></td>
        </tr>

        <tr>
          <td align="right"><b>Product Price:</b></td>
          <td><input type="text" name="product_price" pattern="[0-9.]{1,6}" required /></td>
        </tr>

        <tr>
          <td align="right"><b>Product Description:</b></td>
          <td><textarea name="product_description" cols="50" rows="10" ></textarea></td>
        </tr>

        <tr>
          <td align="right"><b>Product Category:</b></td>
          <td>
            <select name="product_cat" required >
              <option>Select a Category</option>
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
          <td><input type="date" name="product_publishedDate" min="1900-01-01" /></td>
        </tr>

        <tr align="center">
          <td colspan="10"><input type="submit" name="insert_post" value="Insert Product Now" /></td>
        </tr>

      </table>
<td><button><a href="index.php" style="text-decoration:none;">Back</a></button></td>

</form>

</body>
</html>

<?php
  if(isset($_POST['insert_post'])){

    //getting the text data from the fields
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_cat = $_POST['product_cat'];
    $product_publishedDate = $_POST['product_publishedDate'];

    //getting the image from the field
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp,"product_image/$product_image");

    $insert_product = "insert into menu (food_name,published_date,food_detail,food_cat,food_price,food_image) values
    ('$product_title','$product_publishedDate','$product_description','$product_cat','$product_price','$product_image')";

    $insert_pro = mysqli_query($con,$insert_product);
    if($insert_pro){

      echo "<script>alert('Product has been inserted!')</script>";
      echo "<script>window.open('index.php?insert_product','_self')</script>";
    }

  }



 ?>
