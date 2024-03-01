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
			window.open('serachForms/usersearch.php','ChildWindow','status=no','menubar=no','location=no','resizable=no','scrollbars=no','1','width =500,height=500');
			
		
		}
		
		
		function fillUserDetails(){
		
			var mySelect2 = document.getElementById("emp"); 
			mySelect2.selectedIndex = parseInt(document.getElementById('Emp_ID').value);
			
			var mySelect1 = document.getElementById("gru"); 		
			mySelect1.selectedIndex = parseInt(document.getElementById('Gro_ID').value);
				
			
			document.getElementById('id').value = document.getElementById('ID').value;
			document.getElementById('uid').value = document.getElementById('Use_ID').value;
			
			
			
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
	
		$sql = "SELECT `ID`,`Use_ID`,`Gro_ID`,`Emp_ID` FROM `system_user` WHERE `ID`= '$id'";
	
		$res = $conn->query($sql);
					
		while ($row = mysqli_fetch_assoc($res)) {
			
			echo '<input type="hidden" id="ID"      value="'. $row['ID'].'">';
			echo '<input type="hidden" id="Use_ID"  value="'. $row['Use_ID'].'">';
			echo '<input type="hidden" id="Gro_ID"  value="'. $row['Gro_ID'].'">';
			echo '<input type="hidden" id="Emp_ID"  value="'. $row['Emp_ID'].'">';
		  						
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
        	
           <form name = "frmMain" id = "frmMain"  action = "..\dbupdate\user_edit_update.php"  method = "post">
				<table>	
					<tr >
						<th colspan="2">Creare User</th>
						
					</tr>
					<tr>
						<td style="width: 165px">User ID :</td>
						<td><input type="text" name="id" id="id" value="" readonly><a href="#" onClick="searchClick();"><i class="ri-search-2-line"></i></a></td>
					</tr>
					
					<tr>
						<td>User Name 	:</td>
						<td><input type="text" size="25" name="user" id="uid" required readonly></td>
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
							<select name="emp" id="emp" required disabled >
								<option value="" selected="selected" required>Select Employee</option>
								<?php
									include '../dbupdate/dbcon.php';
									$sql = "SELECT em.Emp_ID,em.First_Name,ho.name FROM employee_master as em, hospital AS ho WHERE em.Hos_ID = ho.Hos_ID";
									
									$res = $conn->query($sql);
									
									while ($row = mysqli_fetch_assoc($res)) {
				  						echo '<option value="'. $row['Emp_ID'] .'">'. $row['First_Name'].'</option>';
									}				
									
									$conn->close();
								
								?>
		
						</select>
					
						</td>
					</tr>
				
					<tr>
						<td>User Group</td>
						<td>
							<select name="gru" id="gru" required >
								<option value="" selected="selected" required>Select Group</option>
								<?php
									include '../dbupdate/dbcon.php';
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
						<td><input type="hidden" name="sea_click" id="sea_click" value="0"></td>
						<td><input type="submit" size="20" name="sub" value="Edit" align="left" class="btn btn-danger" ></td>
					</tr>	
					
				
				
				</table>
			</form>
           
        </div>
    </section>
    <script>
    	fillUserDetails()
    </script>

</body>
</html>