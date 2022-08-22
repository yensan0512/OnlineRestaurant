<!DOCTYPE>
<html>
  <head>
    <title>My Report</title>
	 <link rel="stylesheet" href="../style/styles.css" media="all" />
  </head>
<body>
<br><br>
<div align="center">
	<tr align="center">
		<h1 style="color:#ff33ff">My Daily Report</h1>
		<br/>
			<form method="POST" action="dailyreport.php">
			<?php
			include("include/db.php");
			$query = "SELECT date FROM orders GROUP BY date";
			$result = mysqli_query($con,$query);
			echo "Select Date : ";
			echo "<select name=\"date\">";
			 while($row=mysqli_fetch_array($result))
			 {
				  echo "<option value= '".$row['date']."' > ".$row['date']." </option>";
			 }
			 echo "</select>";
			 echo "<br><br>";

			?>
			<p><input type="submit" value="Search This Date" name="search"/></p>
			</form>
			<br />

			<input type="button" name ="Back" value = "BACK" onclick="window.location.href = 'index.php?view_report'"/> <br /><br />



	</tr>

<div>
</body>
</html>