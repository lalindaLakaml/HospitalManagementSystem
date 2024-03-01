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
    
    function addRow() {
	    var table = document.getElementById("repTable");
	    var row = table.insertRow(table.rows.length);
	    
	    
	    	var lin  = document.getElementById("linecount");
	        var licou = parseInt(lin.value);

	    
	    
	        var cell = row.insertCell(0);
	        var input = document.createElement("input");
	        input.type = "hidden";
	        input.value = licou + table.rows.length
	        input.name = "id" + (table.rows.length);
	        cell.appendChild(input);
	        
	       	var cell = row.insertCell(1);
	        var input = document.createElement("input");
	        input.type = "text";
	        input.name = "name" + (table.rows.length);
	        cell.appendChild(input);
	        
	        var deleteButtonCell = row.insertCell(2);
		    var deleteButton = document.createElement("button");
		    deleteButton.innerHTML = "Delete";
		    deleteButton.setAttribute("onclick", "deleteRow(this)");
		    deleteButtonCell.appendChild(deleteButton);

			document.getElementById('count').value = table.rows.length;

	        
	    	
	}

	function deleteRow(button) {
	    var row = button.parentNode.parentNode;
	    row.parentNode.removeChild(row);
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
					
	
					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			    		echo $var. htmlspecialchars($_SESSION['user']) . "!";
			    		
					} 
					
					
					$conn->close();

				
			 		 				
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
        	
           <form name = "frmMain" id = "frmMain"  action = "..\dbupdate\create_report_update.php"  method = "post">
				<table>	
				
					<?php
						include '../dbupdate/dbcon.php';
						$sql= "SELECT MAX(`line_ID`) AS id FROM `lab_report_details`";
						$res = $conn->query($sql);
						while ($row = mysqli_fetch_assoc($res)) {  						
				  				echo '<input type="hidden" value="'.$row['id'].'" name="linecount" id="linecount">';
						}
	
						
						$conn->close();

					
					?>
				
					<tr >
						<th colspan="2">Creare Report</th>
						
					</tr>
					<tr>
						<td style="width: 165px">Report ID :</td>
						<td>
						
						<?php
						include '../dbupdate/dbcon.php';
						
						$sql = "SELECT MAX(`LRE_ID`) AS id FROM `lab_report_header`";
									
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
						<td>Report Name:</td>
						<td><input type="text" size="50" name="repname"  id="repname" required ></i></td>
					</tr>

					
						
					<tr>
						<td>Specimen Type</td>
						<td>
							<select name="type" id="type" required >
								<option value="" selected="selected" required>Select Type</option>
								<?php
									include '../dbupdate/dbcon.php';
									$sql = "SELECT `spe_type_id`,`Description` FROM `lab_specimen_types`";
									
									$res = $conn->query($sql);
									
									while ($row = mysqli_fetch_assoc($res)) {
				  						echo '<option value="' . $row['spe_type_id'] . '">' . $row['Description'] . '</option>';
									}				
									
									$conn->close();
								
								?>
		
						</select>
					
						</td>
					</tr>
					
					<tr>
						<td colspan="2">
							<a href="#" onclick="addRow()">Add Row </a>
							
    						<table id="repTable">
       
    						</table>

						</td>
					</tr>
		
				
				<tr>
						<td><input type="hidden" size="50" name="count" id="count" required ></td>
						<td><input type="submit" size="20" name="sub" value="Save" align="left" class="btn btn-danger" ></td>
					</tr>	
					
				
				
				</table>
			</form>
           
        </div>
    </section>
    
</body>
</html>