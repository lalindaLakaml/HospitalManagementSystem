<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styletest.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
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
			window.open('serachForms/employeesearch.php','ChildWindow','status=no','menubar=no','location=no','resizable=no','scrollbars=no','1','width =500,height=500');
			
		
		}
		
		
		function fillEmpDetails(){
			
			var mySelect1 = document.getElementById("tit"); 		
			mySelect1.selectedIndex = parseInt(document.getElementById('Title').value);
				
			
		  	mySelect1 = document.getElementById("gen"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Gender').value);
		
			mySelect1 = document.getElementById("typ"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Emp_Typ_ID').value);
		
		
			mySelect1 = document.getElementById("hos"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Hos_ID').value);
		
			mySelect1 = document.getElementById("cti"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Cty_ID').value);
			
			document.getElementById('id').value = document.getElementById('Emp_ID').value;
			document.getElementById('fname').value = document.getElementById('First_Name').value;
			document.getElementById('mname').value = document.getElementById('Middle_Name').value;
			document.getElementById('lname').value = document.getElementById('Last_Name').value;
			document.getElementById('mob').value = document.getElementById('mobile').value;
			document.getElementById('lan').value = document.getElementById('land').value;
			document.getElementById('email').value = document.getElementById('ema').value;
			document.getElementById('ad1').value = document.getElementById('Add1').value;
			document.getElementById('ad2').value = document.getElementById('Add2').value;
			document.getElementById('ad3').value = document.getElementById('Add3').value;
			
			
			var dateString = document.getElementById('DOB').value;	
			var dateObj = new Date(dateString);
			var formattedDate = dateObj.toISOString().split('T')[0];
			document.getElementById("dob").value = formattedDate;
		
		
			var dateString_1 = document.getElementById('Join_Date').value;	
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

    
</head>

<body >

<?php
	include 'dbcon.php';
		
	if (isset($_SESSION['section']) && $_SESSION['section'] == true) {
    	$id = $_SESSION['section'];
	
		$sql = "SELECT `Emp_ID`,`Emp_Typ_ID`,`Title`,`First_Name`,`Middle_Name`,`Last_Name`,`DOB`,`Add1`,`Add2`,`Add3`,`Cty_ID`,`Gender`,`email`,`Join_Date`,`Hos_ID`,`mobile`,`land` FROM `employee_master` WHERE `Emp_ID` = '$id'";
	
		$res = $conn->query($sql);
					
		while ($row = mysqli_fetch_assoc($res)) {
			
			echo '<input type="hidden" id="Emp_ID"  value="' . $row['Emp_ID'].'">' ;
			echo '<input type="hidden" id="Emp_Typ_ID" value="' . $row['Emp_Typ_ID'].'">' ;
			echo '<input type="hidden" id="Title"  value="' . $row['Title']        .'">';
			echo '<input type="hidden" id="First_Name"  value="' . $row['First_Name']    .'">';
			echo '<input type="hidden" id="Middle_Name"  value="' . $row['Middle_Name'] .'">';
			echo '<input type="hidden" id="Last_Name"  value="' . $row['Last_Name']    .'">';
			echo '<input type="hidden" id="DOB" value="' . $row['DOB'] . '">';
			echo '<input type="hidden" id="Add1" value="' . $row['Add1'] . '">';
			echo '<input type="hidden" id="Add2"  value="' . $row['Add2'] . '">';
			echo '<input type="hidden" id="Add3"  value="' . $row['Add3'] . '">';
			echo '<input type="hidden" id="Cty_ID"  value="' . $row['Cty_ID'] . '">';
			echo '<input type="hidden" id="Gender"  value="' . $row['Gender'] . '">';
			echo '<input type="hidden" id="ema" value="' . $row['email'] . '">';
			echo '<input type="hidden" id="Join_Date"  value="' . $row['Join_Date'] . '">';
			echo '<input type="hidden" id="Hos_ID"  value="' . $row['Hos_ID'] . '">';
			echo '<input type="hidden" id="mobile"  value="' . $row['mobile'] . '">';
			echo '<input type="hidden" id="land"  value="' . $row['land'] . '">';	
  						
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
        
		

<form name = "frmMain" id = "frmMain"  action = "..\dbupdate\create_employe_edit.php"  method = "post" >

<table>
	<tr >
		<th colspan="2">Edit Employee</th>
		
	</tr>
	<tr>
		<td>Employee ID :</td>
		<td><input type="text" name="id" id="id" value="" readonly><a href="#" onClick="searchClick();"><i class="ri-search-2-line"></i></a></td>
	</tr>
		
	<tr>
		<td>Title :</td>
		<td>
			<select name="tit" id="tit" required>
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
		<td><input type="text"  name="fname" id="fname" size="50" required><br></td>
	</tr>
	
		<tr>
		<td>Middle Name :</td>
		<td><input type="text"  name="mname" id="mname" size="50" required><br></td>
	</tr>
		<tr>
		<td>Last Name :</td>
		<td><input type="text"  name="lname" id="lname" size="50" required><br></td>
	</tr>

	</tr>
		<tr>
		<td>Date Of Birth :</td>
		<td><input type="date"  name="dob" id="dob" size="50" required><br></td>
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
		<td>Employee Type</td>
		<td>
			<select name="typ" id="typ" required>
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
			<select name="hos" id="hos" required>
				<option value=""   selected="selected">Select Hospital</option>
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
		<td><input type="tel"   name="mob" id="mob" size="50" ><br></td>
	</tr>

	<tr>
		<td>Land Number :</td>
		<td><input type="tel"  name="lan" id="lan" size="50" required><br></td>
	</tr>

	<tr>
		<td>email :</td>
		<td><input type="email"  name="email" id="email" size="50" ><br></td>
	</tr>
	
	<tr>
		<td>Addres 1 </td>
		<td><input type="text" size="40" name="ad1" id="ad1"> </td>
	</tr>
	<tr>
		<td>Addres 2 </td>
		<td><input type="text" size="40" name="ad2" id="ad2"> </td>
	</tr>

	<tr>
		<td>Addres 3 </td>
		<td><input type="text" size="40" name="ad3" id="ad3"> </td>
	</tr>
	<tr>
		<td>City</td>
		<td>
			<select name="cti" id="cti" required>
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
		<td><input type="date" size="40" name="jdate" id="jdate"> </td>
	</tr>

	<tr>
		<td><input type="hidden" name="sea_click" id="sea_click" value="0"></td>
		<td><?php 
				$id = $_SESSION['user'];
				$dis = "";
				include '../dbupdate/dbcon.php';
					$sql = "SELECT per.Edit_Rec FROM system_user_groups AS gro , system_user AS suse, system_group_permission AS per, system_options AS opt  WHERE gro.Gro_ID = suse.Gro_ID AND gro.Gro_ID = per.Gro_ID AND opt.Opt_ID = per.Opt_ID AND suse.Use_ID = '$id' AND opt.Opt_ID = 7";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
						if ($row['Edit_Rec'] == 0){
							$dis = "disabled";
						}
  						
					}
					echo '<input type="submit"  value="Edit" name="submit" class="btn btn-danger" ' . $dis . ' ></td>';
					
					$conn->close();

		
			?>  
	</tr>	

	</table>
	
	</form>	    
          
    </section>
   	<script>
       	fillEmpDetails()
    </script>
	
</body>
</html>