<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<script type="text/javascript" src="js/stm.js"></script>
</head>

<body >
	<form name = "frmMain" id = "frmMain"  action = "dbupdate\createcity_update.php"  method = "post" onsubmit="JavaScript:return test();">
<table>

	


	<tr >
		<th colspan="2">Creare City</th>
		
	</tr>
	<tr>
		<td>City ID :</td>
		<td>
		
		<?php
		include 'dbcon.php';
		
		$sql = "SELECT MAX(`Cit_ID`) AS id FROM `city`";
					
		$res = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($res)) {
		
		$i = intval($row['id'])+1;
		
  						echo '<input type="text" name="id" value="' . $i . '" readonly>';
					}

				
		
		
		$conn->close();
		
		?>

		
		</td>
	</tr>
	
	<tr>
		<td>City Name 	:</td>
		<td><input type="text" size="25" name="name" required ></td>
	</tr>
		
	

	<tr>
		<td>District</td>
		<td>
			<select name="dis" required >
				<option value="" selected="selected" required>Select District</option>
				<?php
					include 'dbcon.php';
					$sql = "SELECT `Dis_ID`,`Description` FROM `district` WHERE `isActiva` = 1";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['Dis_ID'] . '">' . $row['Description'] . '</option>';
					}
	
					
					$conn->close();
				
				?>
				
				
		</select>
	
		</td>
	</tr>

	<tr>
		<td></td>
		<td><input type="submit" size="20" name="sub" value="Save" align="left" class="btn btn-danger" ></td>
	</tr>	
	


</table>
</form>


</body>

</html>
