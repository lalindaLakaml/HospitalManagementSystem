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
        	
           <form name = "frmMain" id = "frmMain"  action = "opdinspection.php"  method = "post">
				<table>	
					<tr >
						<th colspan="2">OPD Patirnts</th>
						
					</tr>
					<tr>
						<td style="width: 165px">Token ID :</td>
						<td> Patient Name </td>
						<td> Patient Age </td>	
						<td> Patient Height </td>
						<td> Patient Weight </td>									
					</tr>
					
					<?php
						include '../dbupdate/dbcon.php';
						
						
						
						$sql = "SELECT `Tocken_No`,CONCAT(tit.Description, ' ', First_Name, ' ', `Middle_Name`, ' ',`Last_Name`) AS name, (DATE(NOW()) - DATE(pat.DOB))/10000 AS diff, `height`,`weight` FROM `opd` AS opd , patient_master AS pat, title AS tit WHERE opd.Pat_ID = pat.Pat_ID AND pat.Title=tit.Tit_ID AND `isInspect`=0 ORDER By `Tocken_No`";
									
						$res = $conn->query($sql);
						while ($row = mysqli_fetch_assoc($res)) {
						
						
						
				  						echo '<tr><td> '.$row['Tocken_No'].'</td> <td>'.$row['name'].'</td> <td>'.(int)$row['diff'].'</td> <td>'.$row['height'].'</td> <td>'.$row['weight'].'</td></tr>';
									}				
						
						$conn->close();
						
						?>
					
					
												
				
					<tr>
						<td><input type="hidden" name="sea_click" id="sea_click" value="0"></td>
						<td><input type="submit" size="20" name="sub" value="Check Next Patient" align="left" class="btn btn-danger" ></td>
					</tr>	
					
				
				
				</table>
			</form>
			
		

           
        </div>
    </section>

</body>
</html>