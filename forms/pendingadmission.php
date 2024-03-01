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
 	
  	<script>
		function searchClick() {
			var inputField = document.getElementById("sea_click");     
            inputField.value = "1";
			window.open('serachForms/patientsearch.php','ChildWindow','status=no','menubar=no','location=no','resizable=no','scrollbars=no','1','width =500,height=500');
			
		
		}
		
		
		function fillGroupDetails(){				
			
			document.getElementById('patid').value = document.getElementById('Pat_ID').value;
			document.getElementById('patname').value = document.getElementById('name').value;	
			
	
			
	}

	function myClose(id) {
		document.getElementById('opdid').value = id;
	
		var form = document.getElementById('frmMain');
    	form.submit();  			
	}


	</script>
	
	 <script>
 		window.addEventListener('focus', function() {
          
        var inputField = document.getElementById("sea_click");
            var inputValue = inputField.value;  
                
            if(inputValue == "1"){
            	location.reload();
            	          	
            }  
    
	});
</script>

  
</head>

<body >


<?php
	include 'dbcon.php';
		
	if (isset($_SESSION['section']) && $_SESSION['section'] == true) {
    	$id = $_SESSION['section'];
	
		$sql = "SELECT `Pat_ID`, CONCAT(tit.Description, ' ', First_Name, ' ', `Middle_Name`, ' ',`Last_Name`) AS name FROM `patient_master` pat , title as tit WHERE tit.Tit_ID = pat.title AND `Pat_ID` = '$id'";
		$res = $conn->query($sql);
					
		while ($row = mysqli_fetch_assoc($res)) {
			
			echo '<input type="hidden" id="Pat_ID"      value="'. $row['Pat_ID'].'">';
			echo '<input type="hidden" id="name"  value="'. $row['name'].'">';
  						
			}
	
					
		$conn->close();
    	unset($_SESSION['section']);
    		
		} 
?>


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
        	
           <form name = "frmMain" id = "frmMain"  action = "admission.php"  method = "post">
				<table>	
					<tr >
						<th colspan="2">OPD Patirnts</th>
						
					</tr>
					<tr>
						<td >Token NO</td>
						<td> Name </td>
						<td style="width: 65px"> Age </td>	
						<td> NIC Number </td>
						<td> OPD Doctor </td>									
					</tr>
					
					<?php
						include '../dbupdate/dbcon.php';
							$user = $_SESSION['user'];
							$sql2 = "SELECT War_ID FROM ward_doctor_nurse,system_user WHERE system_user.Emp_ID = ward_doctor_nurse.Emp_ID AND system_user.Use_ID = '$user'";
							$woid = "";		
							
							$res1 = $conn->query($sql2);
							while ($row = mysqli_fetch_assoc($res1)) {
  						
  								$woid = $row['War_ID'];
 			
							}	
						$sql = " SELECT opd.Opd_ID,	patient_master.NIC_Passport, opd.Pat_ID,CONCAT(title.Description, ' ', patient_master.First_Name, ' ', patient_master.Middle_Name, ' ',patient_master.Last_Name) AS name ,(DATE(NOW()) - DATE(patient_master.DOB))/10000 AS age ,CONCAT(tit.Description, ' ', employee_master.First_Name, ' ', employee_master.Middle_Name, ' ',employee_master.Last_Name) AS doc  FROM `opd_admit`, opd , patient_master,employee_master,title,title as tit WHERE opd.Opd_ID = opd_admit.Opd_ID AND opd.Pat_ID =patient_master.Pat_ID AND opd.Doc_ID = employee_master.Emp_ID AND `WO_ID` ='$woid' AND patient_master.Title = title.Tit_ID AND employee_master.Title = tit.Tit_ID  AND opd_admit.statues ='0' ORDER BY `Opd_ID`";
				
						
						$res = $conn->query($sql);
						while ($row = mysqli_fetch_assoc($res)) {
						
				  						echo '<tr><td><a href=# onclick=myClose("'.$row['Opd_ID'].'");>'.$row['Opd_ID'].'</td> <td>'.$row['name'].'</a></td> <td>'.(int)$row['age'].'</td> <td>'.$row['NIC_Passport'].'</td> <td>'.$row['doc'].'</td></tr>';
									}				
						
						$conn->close();
						
						?>
					
					
												
				
					<tr>
						<td><input type="hidden" name="opdid" id="opdid" value="0"></td>
						<td><input type="submit" size="20" name="sub" value="Check Next Patient" align="left" class="btn btn-danger" ></td>
					</tr>	
					
				
				
				</table>
			</form>
			
		

           
        </div>
    </section>

</body>
</html>