<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styletest.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   
    
    <title>HMPC</title>   
    
   	<?php 
		session_start();
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {		
    		
		} else{
			header('Location: \HMSystem\forms\login.php');
			exit;
		}		
 		 				
 	?>
    
</head>

<body >
	<section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            
            <?php
				include '../dbupdate/dbcon.php';	
				$sql = "SELECT `log1`,`log2` FROM `settings`";				
				$res = $conn->query($sql);
				while ($row = mysqli_fetch_assoc($res)) {  						
  					echo '<h2>'.$row['log1'].'<span>'.$row['log2'].'</span></h2>';
				}
		
				$conn->close();		
			?>
                  
            
        </div>
        <div class="search--notification--profile">
            <div >
               
            </div>
            
            <div class="notification--profile">
            
                 <div class="picon lock">
                    <p>
                    <?php 
                    
                    include '../dbupdate/dbcon.php';
		
					$sql = "SELECT `greeting` FROM `settings`";				
					$res = $conn->query($sql);
					$var = "";
					while ($row = mysqli_fetch_assoc($res)) {  						
			  				$var = $row['greeting'];
					}
					
					$conn->close();

	
					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			    		echo $var. htmlspecialchars($_SESSION['user']) . "!";
			    		
					} 
				
			 		 				
			 		?>
					</p>
                </div>

            
                <div class="picon lock">
                    <a href="logout.php"><i class="ri-logout-circle-r-line"></i></a>
                </div>
                <div class="picon chat">
                    <a href="change_password.php"><i class="ri-key-line"></i></a>
                </div>

                <div class="picon bell">
                	<?php 
                    
                    include '../dbupdate/dbcon.php';
		
					$sql = "SELECT `Use_ID` FROM `user_notification` WHERE `isRead`= 0";				
					$res = $conn->query($sql);
					$var = "N";
					while ($row = mysqli_fetch_assoc($res)) {
					  	$var = "Y";					
			  			
					}
					
					$conn->close();
					if($var == "N"){
						echo "<a href=notification.php><i class=ri-mail-line></i></a>";
					}else{
						echo "<a href=notification.php><i class=ri-mail-unread-line></i></a>";
					}
					
                	?>
                
                    
                </div>
                <div class="picon profile">
                <?php 
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    				echo "<img src=../images/ProfilesImages/" . htmlspecialchars($_SESSION['user']) .".jpg>";
    		
				} 
				?>
                   
                </div>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
            
            <?php 
            	include '../dbupdate/dbcon.php';
				$user = $_SESSION['user'];
				$sql = "SELECT sopt.Opt_ID,sopt.Description,sopt.path,sopt.icon FROM system_user AS suser , system_user_groups AS sgroup , system_group_permission AS sper , system_options AS  sopt WHERE (`Use_ID` = '$user' AND suser.Gro_ID = sgroup.Gro_ID AND sgroup.Gro_ID  = sper.Gro_ID AND sopt.Opt_ID = sper.Opt_ID) AND (sper.Add_Rec = '1' OR sper.Edit_Rec= '1' OR sper.View_Rec= '1')ORDER by sopt.order";
				

				$res = $conn->query($sql);
					while ($row = mysqli_fetch_assoc($res)) {
  						
  						echo '<li>';
						echo '<a href= \' ' . $row['path'] . ' \'>';
						echo '<span class="icon icon-1"><i class=' . $row['icon'] . '></i></span>';
						echo '<span class="sidebar--item">' . $row['Description'] . '</span></a>';
			
				}
			?>
                
		
            </ul>
            
        </div>
        
        <div class="main--content" id= "con">      	
          
		<form name = "frmMain" id = "frmMain"  action = "..\dbupdate\create_admission_update.php"  method = "post" >
			<table>
				<tr >
					<th colspan="4">Patient Information</th>
					
				</tr>
				
				<?php 
                    
                    include '../dbupdate/dbcon.php';
                    $id  = $_POST['opdid'];
		
					$sql = "SELECT patient_master.Pat_ID,(DATE(NOW()) - DATE(patient_master.DOB))/10000 AS age, CONCAT(title.Description, ' ', patient_master.First_Name, ' ', patient_master.Middle_Name, ' ',patient_master.Last_Name) AS name,opd_admit.Opd_ID,gender.Description AS gend,citizenship.Description AS citiza, religion.Description AS Relig,marital_status.Description AS mat,ethnic_group.Description AS eth FROM opd_admit ,title, opd , patient_master ,gender, citizenship, religion, marital_status ,ethnic_group WHERE opd.Opd_ID = opd_admit.Opd_ID AND patient_master.Pat_ID = opd.Pat_ID AND patient_master.Gender = gender.Gen_ID AND patient_master.Ctz_ID = citizenship.Ctz_ID AND patient_master.Reg_ID = religion.Reg_ID AND patient_master.Mat_ID = marital_status.Mat_ID AND ethnic_group.Eth_ID= patient_master.Eth_ID AND opd_admit.Opd_ID = '$id' AND title.Tit_ID = patient_master.Title";				
					$res = $conn->query($sql);
					$var = "N";
					while ($row = mysqli_fetch_assoc($res)) {
					  echo '<tr><td>OPD ID</td>';
					  echo '<td><input type="text" id="opdid" name="opdid" value="' . $row['Opd_ID'] . '" required></td>';
					  echo '<td>Patient ID</td>';
					  echo '<td><input type="text" id="patid" name="patid" value="' . $row['Pat_ID'] . '" required></td>';
					  echo '<td>Age:</td>';
					  echo '<td><input type="text" id="age" name="age" value="' . (int)$row['age'] . '" required></td>';
					  
					  echo '</tr><tr><td>Name </td><td colspan="3"><input type="text" id="name" name="name" size="63" value="' . $row['name'] . '" required></td></tr>';
					
					  echo '<tr><td>Gender<td><input type="text" id="gen" name="gen" value="' . $row['gend'] . '" required></td></td>';
					  echo '<td>Citizenship</td><td><input type="text" id="citz" name="citz" value="' . $row['citiza'] . '" required></td>';
			  		  echo '<td>Religion</td><td><input type="text" id="rel" name="rel" value="' . $row['Relig'] . '" required></td></tr>';
					
					  echo '<tr><td>Marital Status<td><input type="text" id="mat" name="mat" value="' . $row['mat'] . '" required></td></td>';
					  echo '<td>Ethnicitie</td><td><input type="text" id="eth" name="eth" value="' . $row['eth'] . '" required></td>';
			  		  echo '<td></td><td></td></tr>';
		
					
					}
					

				?>
			
				
				<tr >
					<th colspan="4">Guardian Information</th>
					
				</tr>
				<tr>
					<td>Name </td>
					<td colspan="3"><input type="text" id="gname" name="gname" size="63" required></td>
				</tr>
				<tr>
					<td>Relation </td>
					<td><input type="text" id="Relation" name="Relation"  required></td>
					<td>NIC Number</td>
					<td><input type="text" id="gnic" name="gnic"  required></td>
					<td>Mobile Number</td>
					<td><input type="text" id="gmob" name="gmob"  required></td>

				</tr>
				
			
				<tr>
					<td>Info 1</td>
					<td><input type="text" id="ginfo1" name="ginfo1"  required></td>
					<td>info 2</td>
					<td><input type="text" id="ginfo2" name="ginfo2"  required></td>
					<td>info 3</td>
					<td><input type="text" id="ginfo3" name="ginfo3"  required></td>

				</tr>	
				<tr >
					<th colspan="4">Ward Information</th>
					
				</tr>
	
				
				<tr>
					<td>Admission ID</td>
					<td colspan="5"><?php
						include '../dbupdate/dbcon.php';
						
						$sql = "SELECT MAX(`Adm_ID`) AS id FROM `admission`";
									
						$res = $conn->query($sql);
						while ($row = mysqli_fetch_assoc($res)) {
						
						$i = intval($row['id'])+1;
						
				  						echo '<input type="text" name="admid" value="' . $i . '" readonly>';
									}				
						
						$conn->close();
						
						?>
</td>
					


				</tr>
				<tr>
					<td>Note </td>
					<td colspan="3"><input type="text" id="note" name="note" size="63" required></td>
				</tr>

			
				<tr>
					<td>Bed NO </td>
					<td><select name="bedno" id="bedno" required>
							<option value="" selected="selected">Select Bed</option>
							<?php
								include '../dbupdate/dbcon.php';
							
								$user = $_SESSION['user'];
								$sql2 = "SELECT War_ID FROM ward_doctor_nurse,system_user WHERE system_user.Emp_ID = ward_doctor_nurse.Emp_ID AND system_user.Use_ID = '$user'";
								$woid = "";		
								
								$res1 = $conn->query($sql2);
								while ($row = mysqli_fetch_assoc($res1)) {
	  						
	  								$woid = $row['War_ID'];
	 			
								}	
							
								
								$sql = "SELECT  `Bed_ID`,`Description` FROM `bed` WHERE `Wor_ID` = '$woid' AND bed.isOccupied = 0";
								
								$res = $conn->query($sql);
								
								while ($row = mysqli_fetch_assoc($res)) {
			  						echo '<option value="' . $row['Bed_ID'] . '">' . $row['Description'] . '</option>';
								}
				
								
								$conn->close();
							
							?>
							
							
					</select>
</td>
					<td >Info 1 </td>
					<td><input type="text" id="winfo1" name="winfo1"  required></td>
					<td>Info 2</td>
					<td><input type="text" id="winfo2" name="winfo2"  required></td>

				</tr>

					
			
				
				
			
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td> <input type="submit"  value="Save" name="submit" class="btn btn-danger"></td>
				</tr>
			
		
			
			</table>


         
        </div>
    </section>
    
</body>
</html>