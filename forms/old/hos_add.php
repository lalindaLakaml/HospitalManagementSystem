<form name = "frmMain" id = "frmMain"  action = "dbupdate\create_hospital_update.php"  method = "post" >
<table>
	<tr >
		<th colspan="2">Create Hospital</th>
		
	</tr>
	<tr>
		<td>Hospital ID :</td>
		<td>
		
		<?php
		include 'dbcon.php';
		
		$sql = "SELECT MAX(`Hos_ID`) AS id FROM `hospital`";
					
		$res = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($res)) {
		
		$i = intval($row['id'])+1;
		
  						echo '<input type="text" name="id" value="' . $i . '" readonly>';
					}

				
		
		
		$conn->close();
		
		?>
		
		<a href="#" onClick="window.open('forms/search.php','status=no','menubar=no','location=no','resizable=no','scrollbars=no','1','width =500,height=500')"><i class="ri-search-2-line"></i></a>
		
		
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
		<td>City</td>
		<td>
			<select name="cid" required>
				<option value="" selected="selected">Select City</option>
				<?php
					include 'dbcon.php';
					$sql = "SELECT `Cit_ID`,`Description` FROM `city`";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['Cit_ID'] . '">' . $row['Description'] . '</option>';
					}
	
					
					$conn->close();
				
				?>
				
				
		</select>
	
		</td>
	</tr>


<tr>
		<td>Hospital Type</td>
		<td>
			<select name="type" required>
				<option value="" selected="selected">Select Type</option>
				<?php
					include 'dbcon.php';
					$sql = "SELECT `Typ_ID`,`Description` FROM `hospital_types` WHERE `isactive` =1";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['Typ_ID'] . '">' . $row['Description'] . '</option>';
					}
	
					
					$conn->close();
				
				?>
				
				
		</select>
	
		</td>
	</tr>
	
	<tr>
		<td>Telephon Number :</td>
		<td><input type="tel"  name="tel" size="50" ><br></td>
	</tr>

<tr>
		<td>Fax Number :</td>
		<td><input type="tel"  name="fax" size="50" required><br></td>
	</tr>

<tr>
		<td>email :</td>
		<td><input type="email"  name="email" size="50" ><br></td>
	</tr>

	
	
	<tr>
		<td>addres 1 </td>
		<td><input type="text" size="40" name="ad1"> </td>
	</tr>
	<tr>
		<td>addres 2 </td>
		<td><input type="text" size="40" name="ad2"> </td>
	</tr>

	<tr>
		<td>addres 3 </td>
		<td><input type="text" size="40" name="ad3"> </td>
	</tr>
	
	<tr>
		<td>Contact Person </td>
		<td><input type="text" size="40" name="conp"> </td>
	</tr>

<tr>
		<td>Contact Number </td>
		<td><input type="tel" size="40" name="conu"> </td>
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