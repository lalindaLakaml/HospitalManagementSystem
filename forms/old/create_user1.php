<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<script type="text/javascript" src="js/stm.js"></script>
</head>

<body >
	<form name = "frmMain" id = "frmMain"  action = "dbupdate\creatuser_update.php"  method = "post" onsubmit="JavaScript:return test();">
<table>

	


	<tr >
		<th colspan="2">Creare User</th>
		
	</tr>
	<tr>
		<td>User ID :</td>
		<td>
		
		<?php
		include 'dbcon.php';
		
		$sql = "SELECT MAX(`ID`) AS id FROM `system_user`";
					
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
		<td>User Name 	:</td>
		<td><input type="text" size="25" name="user" required ></td>
	</tr>
	<tr>
		<td>Password  	:</td>
		<td><input type="password" size="25" id="txtPassword" name="txtPassword" required ></td>
	</tr>

	<tr>
		<td>Cofirm Password :</td>
		<td><input type="password" size="25" id="txtConfirm" name="txtConfirm" required ></td>
	</tr>	
	<tr>
		<td>Employee</td>
		<td>
			<select name="emp" required >
				<option value="" selected="selected" required>Select Employee</option>
				<?php
					include 'dbcon.php';
					$sql = "SELECT em.Emp_ID,em.First_Name,ho.name FROM employee_master as em, hospital AS ho WHERE em.Hos_ID = ho.Hos_ID";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['Emp_ID'] . '">' . $row['First_Name'] .' -- '.$row['name']. '</option>';
					}
	
					
					$conn->close();
				
				?>
				
				
		</select>
	
		</td>
	</tr>

	<tr>
		<td>User Group</td>
		<td>
			<select name="gru" required >
				<option value="" selected="selected" required>Select Group</option>
				<?php
					include 'dbcon.php';
					$sql = "SELECT `Gro_ID`,`Description` FROM `system_user_groups` WHERE `isActive` =1 ";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['Gro_ID'] . '">' . $row['Description'] . '</option>';
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
