<?php
include("include/db.php");

if(isset($_GET['edit_cats'])){

  $cat_id = $_GET['edit_cats'];

  $get_cat = "select * from category where cat_id='$cat_id'";

  $run_cat = mysqli_query($con,$get_cat);

  $row_cat = mysqli_fetch_array($run_cat);

  $cat_id = $row_cat['cat_id'];
  $cat_name = $row_cat['cat_name'];

}
 ?>


<form action="" method="post" style="padding" >



              <table width ="600" align="center" bgcolor="SpringGreen">


                <tr>
                  <td align="right"><h3><b>Edit Category:</b></h3></td>
                  <td><input name="edit_cat" type="text" placeholder="Enter new category" pattern="[A-Za-z\s,.-&]{0,100}" value="<?php echo $cat_name;?>" size="40"  /></td>
                </tr>

                <br></br>

                <tr align="center" style="padding:20">
                  <td colspan="2"><input type="submit" name="update_cat" value="Update Category" /></td>
                </tr>

              </table>

</form>

<br>
<td><button><a href="index.php?view_cats" style="text-decoration:none;">Back</a></button></td>
<br><br><br><br></br>

<?php
include("include/db.php");
  if(isset($_POST['update_cat'])){

  $update_id = $cat_id;

  $edit_cat = $_POST['edit_cat'];

  $update_cat = "update category set cat_name='$edit_cat' where cat_id='$update_id'";

  $run_cat = mysqli_query($con,$update_cat);

  $update_procat = "update menu set food_cat='$edit_cat' where food_cat='$cat_name'";
  $run_procat = mysqli_query($con,$update_procat);

  if($run_cat){
    echo "<script>alert('The Category has been updated!')</script>";
    echo "<script>window.open('index.php?view_cats','_self')</script>";
  }

}


 ?>
