<!DOCTYPE>
<html>
  <head>
    <title>My Report</title>
	 <link rel="stylesheet" href="../../style/style.css" media="all" />
  </head>
<body>
			<div>
			<h2 style="color:Indigo">Date :
			<?php
			$da=$_POST['date'];
			$_SESSION['da']=$da;
			echo "".$_SESSION['da']."";
			?></h2>

			<table width="790" align="center" valign="top" bgcolor="#ffccff">
			<tr align="center" style="font-size:20" bgcolor="#ff99ff">
				<th>Order reference</th>
				<th>Order ID</th>
				<th>User ID</th>
				<th>Total Price (RM)</th>
			</tr>

			<?php
			include ("include/db.php");

					$sql3="SELECT * FROM orders WHERE date = '".$_SESSION['da']."'";
					$result3=mysqli_query($con,$sql3);
					if (mysqli_num_rows($result3) > 0)
					{
						// output data of each row
						while($row3 = mysqli_fetch_assoc($result3))
						{
							echo "<th>".$row3["order_reference"]."</th>";
							echo "<th>".$row3["order_id"]."</th>";
							echo "<th>".$row3["user_id"]."</th>";
							echo "<th>".$row3["promotion_price"]."</th>";
							echo "<tr>".PHP_EOL;
						}
					}
					else
					{
						echo "0 results";
					}
					echo "<tr>".PHP_EOL;
			?>
			</table>

			<h2 align="center">Total Transaction :
			<?php
			include("include/db.php");
			$sql="SELECT * FROM orders WHERE date = '".$_SESSION['da']."'";
			$result=mysqli_query($con,$sql);
			$num=mysqli_num_rows($result);
			echo $num;
			echo "<br>";
			?>
			</h2>

			<h2 align="center">Total Sales : RM
			<?php
			include("include/db.php");
			$totalsale = 0;
			$sql="SELECT * FROM orders WHERE date = '".$_SESSION['da']."'";
			$result=mysqli_query($con,$sql);
			while($row3 = mysqli_fetch_array($result))
			{

				$total_price = $row3['promotion_price'];
				$totalsale += $total_price;
		?>

		<?php } ?>

			<?php echo $totalsale;
			echo "<br>";
			?>
			</h2>

			<br>
			<div align="center">
			<input type="button" name ="Back" value = "BACK" onclick="window.location.href = 'daily.php'"/> <br /><br />
			<input type="button" name ="Back" value = "Main Menu" onclick="window.location.href = 'view_report.php'"/> <br /><br />
			</div>
			</div>

		</div>




















</table>
</body>
</html>