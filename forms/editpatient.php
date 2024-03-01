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
		
		
		function fillEmpDetails(){
			
			var mySelect1 = document.getElementById("tit"); 		
			mySelect1.selectedIndex = parseInt(document.getElementById('Title').value);
				
			
		  	mySelect1 = document.getElementById("gen"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Gender').value);
		
			mySelect1 = document.getElementById("citzip"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Ctz_ID').value);
		
		
			mySelect1 = document.getElementById("rel"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Reg_ID').value);
		
			mySelect1 = document.getElementById("matsta"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Mat_ID').value);
			
			mySelect1 = document.getElementById("cti"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Cit_ID').value);

			

			
			document.getElementById('id').value = document.getElementById('Pat_ID').value;
			document.getElementById('fname').value = document.getElementById('First_Name').value;
			document.getElementById('mname').value = document.getElementById('Middle_Name').value;
			document.getElementById('lname').value = document.getElementById('Last_Name').value;		
			document.getElementById('ad1').value = document.getElementById('Add1').value;
			document.getElementById('ad2').value = document.getElementById('Add2').value;
			document.getElementById('ad3').value = document.getElementById('Add3').value;
			document.getElementById('nic').value = document.getElementById('NIC_Passport').value;
			
			//document.getElementById('mob').value = document.getElementById('land').value;
			//document.getElementById('email').value = document.getElementById('ema').value;
			
			
			var dateString = document.getElementById('DOB').value;	
			var dateObj = new Date(dateString);
			var formattedDate = dateObj.toISOString().split('T')[0];
			document.getElementById("dob").value = formattedDate;
		
		
			var dateString_1 = document.getElementById('Reg_Date').value;	
			var dateObj_1 = new Date(dateString_1);
			var formattedDate_1 = dateObj_1.toISOString().split('T')[0];
			document.getElementById("jdate").value = formattedDate_1;

			
			
			
		
		/*	var mySelect2 = document.getElementById("pa"); 
			mySelect2.selectedIndex = parseInt(document.getElementById('h_par').value);
			
			var mySelect2 = document.getElementById("cl"); 
			mySelect2.selectedIndex = parseInt(document.getElementById('h_stcl').value);
		
			var mySelect2 = document.getElementById("ho"); 
			mySelect2.selectedIndex = parseInt(document.getElementById('h_hou').value);
			
			var mySelect2 = document.getElementById("me"); 
			mySelect2.selectedIndex = parseInt(document.getElementById('h_med').value);
		
				
		
			
		
			
	
	*/
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


    <?php
	include 'dbcon.php';
		
	if (isset($_SESSION['section']) && $_SESSION['section'] == true) {
    	$id = $_SESSION['section'];
	
		$sql = "SELECT `Pat_ID`,`Title`,`First_Name`,`Middle_Name`,`Last_Name`,`Add1`,`Add2`,`Add3`,`Cit_ID`,`Gender`,`Ctz_ID`,`Eth_ID`,`Mat_ID`,`Reg_ID`,`Reg_Date`,`DOB`,`NIC_Passport`,`Contact_Person`,`isActive` FROM `patient_master` WHERE `Pat_ID` = '$id'";
	
		$res = $conn->query($sql);
					
		while ($row = mysqli_fetch_assoc($res)) {
			
			echo '<input type="hidden" id="Pat_ID"  value="' . $row['Pat_ID'].'">' ;
			echo '<input type="hidden" id="Title"  value="' . $row['Title']        .'">';
			echo '<input type="hidden" id="First_Name"  value="' . $row['First_Name']    .'">';
			echo '<input type="hidden" id="Middle_Name"  value="' . $row['Middle_Name'] .'">';
			echo '<input type="hidden" id="Last_Name"  value="' . $row['Last_Name']    .'">';
			echo '<input type="hidden" id="Add1" value="' . $row['Add1'] . '">';
			echo '<input type="hidden" id="Add2"  value="' . $row['Add2'] . '">';
			echo '<input type="hidden" id="Add3"  value="' . $row['Add3'] . '">';
			echo '<input type="hidden" id="Cit_ID"  value="' . $row['Cit_ID'] . '">';
			echo '<input type="hidden" id="Gender"  value="' . $row['Gender'] . '">';
			echo '<input type="hidden" id="Ctz_ID" value="' . $row['Ctz_ID'] . '">';
			echo '<input type="hidden" id="Eth_ID"  value="' . $row['Eth_ID'] . '">';
			echo '<input type="hidden" id="Mat_ID"  value="' . $row['Mat_ID'] . '">';
			echo '<input type="hidden" id="Reg_ID"  value="' . $row['Reg_ID'] . '">';
			echo '<input type="hidden" id="Reg_Date"  value="' . $row['Reg_Date'] . '">';
			echo '<input type="hidden" id="DOB" value="' . $row['DOB'] . '">';
			echo '<input type="hidden" id="NIC_Passport"  value="' . $row['NIC_Passport'] . '">';
			echo '<input type="hidden" id="Contact_Person"  value="' . $row['Contact_Person'] . '">';
			
  						
			}
	
					
		$conn->close();
    	unset($_SESSION['section']);
    		
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
          
		<form name = "frmMain" id = "frmMain"  action = "..\dbupdate\edit_patient_update.php"  method = "post" >
			<table>
				<tr >
					<th colspan="2">Create Patient</th>
					
				</tr>
				<tr>
					<td>Patient ID :</td>
					<td><input type="text" name="id" id="id" value="" readonly><a href="#" onClick="searchClick();"><i class="ri-search-2-line"></i></a>							</td>
				</tr>
			
				
					
				<tr>
					<td>Title :</td>
					<td>
						<select id="tit" name="tit" required>
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
					<td><input type="text" id="fname" name="fname" size="50" required><br></td>
				</tr>
				
					<tr>
					<td>Middle Name :</td>
					<td><input type="text" id="mname" name="mname" size="50" required><br></td>
				</tr>
					<tr>
					<td>Last Name :</td>
					<td><input type="text" id="lname" name="lname" size="50" required><br></td>
				</tr>
			
			
				</tr>
					<tr>
					<td>Date Of Birth :</td>
					<td><input type="date" id="dob" name="dob" size="50" required><br></td>
				</tr>
				
				<tr>
					<td>Gender</td>
					<td>
						<select name="gen" id="gen" required>
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
					<td>Citizenship</td>
					<td>
						<select id="citzip" name="citzip" required>
							<option value="" selected="selected">Select Citizenship</option>
							<?php
								include '../dbupdate/dbcon.php';
								$sql = "SELECT `Ctz_ID`,`Description` FROM `citizenship`";
								
								$res = $conn->query($sql);
								
								while ($row = mysqli_fetch_assoc($res)) {
			  						echo '<option value="' . $row['Ctz_ID'] . '">' . $row['Description'] . '</option>';
								}
				
								
								$conn->close();
							
							?>
							
							
					</select>
				
					</td>
				</tr>
			
			
				<tr>
					<td>Religion</td>
					<td>
						<select id="rel" name="rel" required>
							<option value="" selected="selected">Select Religion</option>
							<?php
								include '../dbupdate/dbcon.php';
								$sql = "SELECT `Reg_ID`,`Description` FROM `religion`";
								
								$res = $conn->query($sql);
								
								while ($row = mysqli_fetch_assoc($res)) {
			  						echo '<option value="' . $row['Reg_ID'] . '">' . $row['Description'] . '</option>';
								}
				
								
								$conn->close();
							
							?>
							
							
					</select>
				
					</td>
				</tr>
				
				<tr>
					<td>Marital Status</td>
					<td>
						<select id="matsta" name="matsta" required>
							<option value="" selected="selected">Select Marital Status</option>
							<?php
								include '../dbupdate/dbcon.php';
								$sql = "SELECT `Mat_ID`,`Description` FROM `marital_status`";
								
								$res = $conn->query($sql);
								
								while ($row = mysqli_fetch_assoc($res)) {
			  						echo '<option value="' . $row['Mat_ID'] . '">' . $row['Description'] . '</option>';
								}
				
								
								$conn->close();
							
							?>
							
							
					</select>
				
					</td>
				</tr>
				<tr>
					<td>NIC/Passport Number :</td>
					<td><input type="tel" id="nic" name="nic" size="50" ><br></td>
				</tr>

				
				<tr>
					<td>Mobile Number :</td>
					<td><input type="tel" id="mob" name="mob" size="50" ><br></td>
				</tr>
			
			<tr>
					<td>Land Number :</td>
					<td><input type="tel" id="lan" name="lan" size="50" required><br></td>
				</tr>
			
			<tr>
					<td>email :</td>
					<td><input type="email" id="email" name="email" size="50" ><br></td>
				</tr>
			
				
				
				<tr>
					<td>Addres 1 </td>
					<td><input type="text" size="40" id="ad1" name="ad1"> </td>
				</tr>
				<tr>
					<td>Addres 2 </td>
					<td><input type="text" size="40" id="ad2"  name="ad2"> </td>
				</tr>
			
				<tr>
					<td>Addres 3 </td>
					<td><input type="text" size="40" id="ad3"  name="ad3"> </td>
				</tr>
				<tr>
					<td>City</td>
					<td>
						<select id="cti" name="cti" required>
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
					<td>Create Date </td>
					<td><input type="date" size="40" id="jdate" name="jdate"> </td>
				</tr>
			
				<tr>
					<td><input type="hidden" name="sea_click" id="sea_click" value="0"></td>
					<td><input type="submit"  value="Save" name="submit" class="btn btn-danger"></td>
				</tr>
			
		
			
			</table>
         
        </div>
    </section>
     	<script>
       	fillEmpDetails()
    </script>

</body>
</html>