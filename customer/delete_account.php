
<form method="post" action="">

  <table width ="750" height="200" align="center" bgcolor="Azure">

    <tr align="center">
      <td colspan="10"><h2><b>DELETE ACCOUNT </b></h2></td>
    </tr>

    <tr align="center">
      <td colspan="10"><h2><b>Are you sure to delete your recent account?</b></h2></td>
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

  $user = $_SESSION['user_email'];
  if(isset($_POST['yes'])){

    $delete_user = " delete from user where user_email='$user'";

    $run_user = mysqli_query($con, $delete_user);

    echo "<script>alert('Your account has been deleted!')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
  }

  if(isset($_POST['no'])){

    echo "<script>alert('Thanks!')</script>";
    echo "<script>window.open('my_account.php','_self')</script>";
  }

 ?>
