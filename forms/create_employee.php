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
			window.open('serachForms/employeesearch.php','ChildWindow','status=no','menubar=no','location=no','resizable=no','scrollbars=no','1','width =500,height=500');				
		}
	
	</script>

 	  
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
		<td></td>
		<td> <input type="submit"  value="Save" name="submit" class="btn btn-danger"></td>
	</tr>
	

	</table>
	
	</form>
	    
          
    </section>
   		
</body>
</html>