

<form name = "frmMain" id = "frmMain"  action = "..\dbupdate\create_employe_update.php"  method = "post" >

<table>
	<tr >
		<th colspan="2">Create Employee</th>
		
	</tr>
	<tr>
		<td>Employee ID :</td>
		<td>
		
		<?php
		include '../dbupdate/dbcon.php';
		
		$sql = "SELECT MAX(`Emp_ID`) AS id FROM `employee_master`";
					
		$res = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($res)) {
		
		$i = intval($row['id'])+1;
		
  						echo '<input type="text" name="id" value="' . $i . '" readonly>';
					}			
		
		
		$conn->close();
		
		?>
		
		<a href="#" onClick="searchClick();"><i class="ri-search-2-line"></i></a>
		
		
		</td>
	</tr>

	
		
	<tr>
		<td>Title :</td>
		<td>
			<select name="tit" required>
				<option value="" selected="selected">Select Title </option>
				<?php
					include '../dbupdate/dbcon.php';
					$sql = "SELECT `Tit_ID`,`Description` FROM `title` WHERE `isactive` =1";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['Tit_ID'] . '">' . $row['Description'] . '</option>';
					}
	
					
					$conn->close();
				
				?>
				
				
		</select>
	
		</td>
	</tr>

	
	<tr>
		<td>First Name :</td>
		<td><input type="text"  name="fname" size="50" required><br></td>
	</tr>
	
		<tr>
		<td>Middle Name :</td>
		<td><input type="text"  name="mname" size="50" required><br></td>
	</tr>
		<tr>
		<td>Last Name :</td>
		<td><input type="text"  name="lname" id="lname" size="50" required><br></td>
	</tr>


	</tr>
		<tr>
		<td>Date Of Birth :</td>
		<td><input type="date"  name="dob" size="50" required><br></td>
	</tr>
	
	<tr>
		<td>Gender</td>
		<td>
			<select name="gen" required>
				<option value="" selected="selected">Select Gender</option>
				<?php
					include '../dbupdate/dbcon.php';
					$sql = "SELECT `Gen_ID`,`Description` FROM `gender`";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['Gen_ID'] . '">' . $row['Description'] . '</option>';
					}
	
					
					$conn->close();
				
				?>
				
				
		</select>
	
		</td>
	</tr>



	<tr>
		<td>Employee Type</td>
		<td>
			<select name="typ" required>
				<option value="" selected="selected">Select Type</option>
				<?php
					include '../dbupdate/dbcon.php';
					$sql = "SELECT `Emp_Typ_ID`,`Description` FROM `employee_types`";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['Emp_Typ_ID'] . '">' . $row['Description'] . '</option>';
					}
	
					
					$conn->close();
				
				?>
				
				
		</select>
	
		</td>
	</tr>


<tr>
		<td>Hospital</td>
		<td>
			<select name="hos" required>
				<option value="" selected="selected">Select Hospital</option>
				<?php
					include '../dbupdate/dbcon.php';
					$sql = "SELECT `Hos_ID`,`name` FROM `hospital` WHERE `isActive` =1";
					
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
		<td>Mobile Number :</td>
		<td><input type="tel"  name="mob" size="50" ><br></td>
	</tr>

<tr>
		<td>Land Number :</td>
		<td><input type="tel"  name="lan" size="50" required><br></td>
	</tr>

<tr>
		<td>email :</td>
		<td><input type="email"  name="email" size="50" ><br></td>
	</tr>

	
	
	<tr>
		<td>Addres 1 </td>
		<td><input type="text" size="40" name="ad1"> </td>
	</tr>
	<tr>
		<td>Addres 2 </td>
		<td><input type="text" size="40" name="ad2"> </td>
	</tr>

	<tr>
		<td>Addres 3 </td>
		<td><input type="text" size="40" name="ad3"> </td>
	</tr>
	<tr>
		<td>City</td>
		<td>
			<select name="cti" required>
				<option value="" selected="selected">Select City</option>
				<?php
					include '../dbupdate/dbcon.php';
					$sql = "SELECT `Cit_ID`,`Description` FROM `city` WHERE `isActiva`=1";
					
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
		<td>Join Date </td>
		<td><input type="date" size="40" name="jdate"> </td>
	</tr>

	

	<tr>
		<td><input type="hidden" name="sea_click" id="sea_click" value="0">	</td>
		<td> <input type="submit"  value="Save" name="submit" class="btn btn-danger"></td>
	</tr>

	

	</table>
	
	</form>
