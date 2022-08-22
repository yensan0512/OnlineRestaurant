<form action="" method="post" style="padding" >

              <table width ="750" height="100" align="center" bgcolor="PaleGreen">

                <tr>
                  <td align="right"><h1 style="color:DarkGreen"><b>Insert New Category:</b></h></td>
                  <td><input name="new_cat" type="text" placeholder="Enter new category" size="40" pattern="[A-Za-z&\s,.-]{0,100}" required /></td>
                </tr>

                <br></br>

                <tr align="center" style="padding:20">
                  <td colspan="2"><input type="submit" name="add_cat" value="Add Category" /></td>
                </tr>

              </table>

              <td><br><button><a href="index.php" style="text-decoration:none;">Back</a></button></br></td>

</form>

<?php
include("include/db.php");
  if(isset($_POST['add_cat'])){
  $new_cat = $_POST['new_cat'];

  $insert_cat = "insert into category (cat_name) values ('$new_cat')";

  $run_cat = mysqli_query($con,$insert_cat);

  if($run_cat){
    echo "<script>alert('New Category has been inserted!')</script>";
    echo "<script>window.open('index.php?view_cats','_self')</script>";
  }
}


 ?>
