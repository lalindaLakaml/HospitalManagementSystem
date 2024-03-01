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
			window.open('serachForms/bedsearch.php','ChildWindow','status=no','menubar=no','location=no','resizable=no','scrollbars=no','1','width =500,height=500');
			
		
		}
		
		
		function fillGroupDetails(){				
			
			document.getElementById('id').value = document.getElementById('Bed_ID').value;
			document.getElementById('note').value = document.getElementById('Description').value;	
			
			var mySelect1 = document.getElementById("type"); 		
			mySelect1.selectedIndex = parseInt(document.getElementById('Bed_Typ_ID').value);
				
			
		  	mySelect1 = document.getElementById("ward"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Wor_ID').value);
	
			
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
	
		$sql = "SELECT `Bed_ID`,`Bed_Typ_ID`,`Wor_ID`,`Description` FROM `bed` WHERE `Bed_ID` ='$id'";
		$res = $conn->query($sql);
					
		while ($row = mysqli_fetch_assoc($res)) {
			
			echo '<input type="hidden" id="Bed_ID"      value="'. $row['Bed_ID'].'">';
			echo '<input type="hidden" id="Bed_Typ_ID"  value="'. $row['Bed_Typ_ID'].'">';
			echo '<input type="hidden" id="Wor_ID"      value="'. $row['Wor_ID'].'">';
			echo '<input type="hidden" id="Description" value="'. $row['Description'].'">';
  						
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
        	
           <form name = "frmMain" id = "frmMain"  action = "..\dbupdate\editbed_update.php"  method = "post">
				<table>	
					<tr >
						<th colspan="2">Edit Bed</th>
						
					</tr>
					<tr>
						<td style="width: 165px">Bed ID :</td>
						<td><input type="text" name="id" id="id" value="" readonly><a href="#" onClick="searchClick();"><i class="ri-search-2-line"></i></td>
					</tr>
					
					<tr>
						<td>Note 	:</td>
						<td><input type="text" size="25" name="note" id="note" required ></td>
					</tr>
						
					<tr>
						<td>Bed Type</td>
						<td>
							<select name="type" id="type" required >
								<option value="" selected="selected" required>Select Type</option>
								<?php
									include '../dbupdate/dbcon.php';
									$sql = "SELECT `Bed_Typ_ID`,`Description` FROM `bed_types` ";
									
									$res = $conn->query($sql);
									
									while ($row = mysqli_fetch_assoc($res)) {
				  						echo '<option value="' . $row['Bed_Typ_ID'] . '">' . $row['Description'] . '</option>';
									}				
									
									$conn->close();
								
								?>
		
						</select>
					
						</td>
					</tr>
				
					<tr>
						<td>Ward</td>
						<td>
							<select name="ward" id="ward" required >
								<option value="" selected="selected" required>Select Ward</option>
								<?php
									include '../dbupdate/dbcon.php';
									$sql = "SELECT `Wor_ID`,`Description` FROM `wards`";
									
									$res = $conn->query($sql);
									
									while ($row = mysqli_fetch_assoc($res)) {
				  						echo '<option value="' . $row['Wor_ID'] . '">' . $row['Description'] . '</option>';
									}	
									$conn->close();
								
								?>				
								
						</select>
					
						</td>
					</tr>
				
				<tr>
						<td><input type="hidden" name="sea_click" id="sea_click" value="0"></td>
						<td><input type="submit" size="20" name="sub" value="Save" align="left" class="btn btn-danger" onclick="return  checkPasswordMatch();"></td>
					</tr>	
					
				
				
				</table>
			</form>
           
        </div>
    </section>
    <script>
       	fillGroupDetails()
    </script>

</body>
</html>