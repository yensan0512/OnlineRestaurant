<br><br><br></br>

<form method="post" action="">

  <table width ="600" align="center" bgcolor="SpringGreen">

    <tr align="center">
      <td colspan="10"><h2><b>DELETE this user </b></h2></td>
    </tr>

    <tr align="center">
      <td colspan="10"><h2><b>Are you sure to delete this user? </b></h2></td>
    </tr>

    <tr align="center">
    <td> <input name="yes" type="submit" value="Yes" />
      </td>
    </tr>



    <tr align="center">
    <td> <input name="no" type="submit" value="No" />

    </td>
    </tr>


  </table>

</form>

<?php

include("include/db.php");
if(isset($_GET['delete_u'])){

  $delete_id = $_GET['delete_u'];

  if(isset($_POST['yes'])){

  $delete_u = "delete from user where user_id = '$delete_id'";
  $run_delete = mysqli_query($con,$delete_u);

  if($run_delete){
    echo "<script>alert('The customer has been deleted!')</script>";
    echo "<script>window.open('index.php?view_customers','_self')</script>";
  }
}

if(isset($_POST['no'])){

echo "<script>alert('Thanks!')</script>";
echo "<script>window.open('index.php?view_customers','_self')</script>";
}


}
 ?>
