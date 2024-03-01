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
        	
           <form name = "frmMain" id = "frmMain"  action = "..\dbupdate\creatgroup_update.php"  method = "post">
	<table>

	<tr >
		<th colspan="2">Creare User</th>
		
	</tr>
	<tr>
		<td>User ID :</td>
		<td>
		
		<?php
		include '../dbupdate/dbcon.php';
		
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
            include '../dbupdate/dbcon.php';
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

           
        </div>
    </section>
    
</body>
</html>