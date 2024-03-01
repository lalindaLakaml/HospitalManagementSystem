<form name = "frmMain" id = "frmMain"  action = "dbupdate\create_ward_update.php"  method = "post" >
<table>
	<tr >
		<th colspan="2">Create Word</th>
		
	</tr>
	<tr>
		<td>Ward ID :</td>
		<td>
		
		<?php
		include 'dbcon.php';
		
		$sql = "SELECT MAX(`Wor_ID`) AS id FROM `wards`";
					
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
		<td>Name :</td>
		<td><input type="text"  name="name" size="50" required><br></td>
	</tr>
	
	<tr>
		<td>Description :</td>
		<td><input type="text"  name="des" size="50" required><br></td>
	</tr>

	

	<tr>
		<td>Hospital</td>
		<td>
			<select name="hid" required>
				<option value="" selected="selected">Select Hospital</option>
				<?php
					include 'dbcon.php';
					$sql = "SELECT `Hos_ID`,`name` FROM `hospital` WHERE `isActive` = 1";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['Hos_ID'] . '">' . $row['name'] . '</option>';
					}
	
					
					$conn->close();
				
				?>
				
				
		</select>
	
		</td>
	</tr>


<tr>
		<td>Ward Type</td>
		<td>
			<select name="type" required>
				<option value="" selected="selected">Select Type</option>
				<?php
					include 'dbcon.php';
					$sql = "SELECT `wor_typ_ID`,`Description` FROM `ward_type` WHERE `isActive` = 1";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['wor_typ_ID'] . '">' . $row['Description'] . '</option>';
					}
	
					
					$conn->close();
				
				?>
				
				
		</select>
	
		</td>
	</tr>
	
	<tr>
		<td>Word Catagory</td>
		<td>
			<select name="cat" required>
				<option value="" selected="selected">Select Catagory</option>
				<?php
					include 'dbcon.php';
					$sql = "SELECT `wor_cat_ID`,`Description` FROM `ward_category` WHERE `isActive` =1";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['wor_cat_ID'] . '">' . $row['Description'] . '</option>';
					}
	
					
					$conn->close();
				
				?>
				
				
		</select>
	
		</td>
	</tr>

	
	<tr>
		<td>Bed Count :</td>
		<td><input type="Number"  name="count" size="50" ><br></td>
	</tr>


	<tr>
		<td></td>
		<td> <input type="submit"  value="Save" name="submit" class="btn btn-danger"></td>
	</tr>

	<tr>
		<td><p></p></td>
		<td></td>
	</tr>
<tr>
		<td><p></p></td>
		<td></td>
	</tr>


</table>