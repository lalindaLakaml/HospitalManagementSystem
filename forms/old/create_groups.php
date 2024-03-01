<form name = "frmMain" id = "frmMain"  action = "dbupdate\creatgroup_update.php"  method = "post" onsubmit="JavaScript:return test();">
	<table>

	<tr >
		<th colspan="2">Creare User</th>
		
	</tr>
	<tr>
		<td>User ID :</td>
		<td>
		
		<?php
		include 'dbcon.php';
		
		$sql = "SELECT MAX(`Gro_ID`) AS Gro_ID FROM `system_user_groups`";
					
		$res = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($res)) {
		
		$i = intval($row['Gro_ID'])+1;
		
  						echo '<input type="text" name="id" value="' . $i . '" readonly>';
					}

				
		
		
		$conn->close();
		
		?>

		
		</td>
	</tr>
	
	<tr>
		<td>Group Name 	:</td>
		<td><input type="text" size="25" name="name" required ></td>
	</tr>
	
		<tr>
		<td>Description	:</td>
		<td><input type="text" size="25" name="dis" required ></td>
	</tr>
	
				
	
	<tr>
		<td></td>
		<td></td>
	</tr>	
	


</table>



<div class="recent--patients">
                <div class="title">
                    <h2 class="section--title">Select Options</h2>
                    
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Option</th>
                                <th>Create</th>
                                <th>Edit</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php 
            include 'dbcon.php';
			//$user = $_SESSION['user'];
			$sql = "SELECT `Opt_ID`,`Description` FROM `system_options` WHERE `isActive` = 1";
			$res = $conn->query($sql);
			while ($row = mysqli_fetch_assoc($res)) {
			
					
					$cre = $row['Opt_ID'] . "CR";
					$edi = $row['Opt_ID'] . "ED";
					$vie = $row['Opt_ID'] . "VI";
  						
  						echo '<tr>';
						echo '<td>'. $row['Description'] .'</td>';
						echo '<td><input type="checkbox" value="1" name = "'. $cre .'"></td>';
						echo '<td><input type="checkbox" value="1" name = "'. $edi .'"></td>';
						echo '<td><input type="checkbox" value="1" name = "'. $vie .'"></td>';
						echo '</tr>';
			
			}
			?>

                        
                  

                        </tbody>
                    </table>
                    
                </div>
                <table>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="submit" size="20" name="sub" value="Save" align="left" class="btn btn-danger" ></td>
                     </tr>
                     </table>
            </div>
          </form> 
