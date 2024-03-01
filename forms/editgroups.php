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
			window.open('serachForms/groupsearch.php','ChildWindow','status=no','menubar=no','location=no','resizable=no','scrollbars=no','1','width =500,height=500');
			
		
		}
		
		
		function fillGroupDetails(){				
			
			document.getElementById('id').value = document.getElementById('Gro_ID').value;
			document.getElementById('name').value = document.getElementById('Description').value;		
			document.getElementById('dis').value = document.getElementById('Memo').value;

			
			var count = parseInt(document.getElementById('count').value);
					
			for (let i = 1; i <= count; i++) {
			
				var rights = parseInt(document.getElementById(i).value);
				
				if(rights == 100){
					var s1 = i + "CR";
    				const checkbox1 = document.getElementById(s1);
					checkbox1.checked = true;

				}else if(rights == 110){
					var s1 = i + "CR";
    				const checkbox1 = document.getElementById(s1);
					checkbox1.checked = true;
				
					var s2 = i + "ED";
    				const checkbox2 = document.getElementById(s2);
					checkbox2.checked = true;

				
				}else if(rights == 111){
					var s1 = i + "CR";
    				const checkbox1 = document.getElementById(s1);
					checkbox1.checked = true;
				
					var s2 = i + "ED";
	    			const checkbox2 = document.getElementById(s2);
					checkbox2.checked = true;
					
					var s3 = i + "VI";
	    			const checkbox3 = document.getElementById(s3);
					checkbox3.checked = true;

				
				}else if(rights == 1){
					var s3 = i + "VI";
	    			const checkbox3 = document.getElementById(s3);
					checkbox3.checked = true;

				}else if(rights == 10){
					var s2 = i + "ED";
	    			const checkbox2 = document.getElementById(s2);
					checkbox2.checked = true;

				
				}else if(rights == 11){
					var s2 = i + "ED";
	    			const checkbox2 = document.getElementById(s2);
					checkbox2.checked = true;
					
					var s3 = i + "VI";
	    			const checkbox3 = document.getElementById(s3);
					checkbox3.checked = true;

				
				}else if(rights == 110){
					var s1 = i + "CR";
    				const checkbox1 = document.getElementById(s1);
					checkbox1.checked = true;
				
					var s2 = i + "ED";
	    			const checkbox2 = document.getElementById(s2);
					checkbox2.checked = true;

				
				}else if(rights == 101){
					var s1 = i + "CR";
    				const checkbox1 = document.getElementById(s1);
					checkbox1.checked = true;
				
					
					var s3 = i + "VI";
	    			const checkbox3 = document.getElementById(s3);
					checkbox3.checked = true;

				
				}


			}					
			
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
	
		$sql = "SELECT `Gro_ID`,`Description`,`Memo` FROM `system_user_groups` WHERE `Gro_ID` ='$id'";
		
	
		$res = $conn->query($sql);
					
		while ($row = mysqli_fetch_assoc($res)) {
			
			echo '<input type="hidden" id="Gro_ID"      value="'. $row['Gro_ID'].'">';
			echo '<input type="hidden" id="Description"  value="'. $row['Description'].'">';
			echo '<input type="hidden" id="Memo"  value="'. $row['Memo'].'">';
			
		  						
			}
			
			
		$sql2 = "Select opt.Opt_ID , opt.Description, per.Add_Rec,per.Edit_Rec,per.View_Rec From system_group_permission AS per RIGHT OUTER JOIN system_options AS opt ON opt.Opt_ID = per.Opt_ID AND per.Gro_ID = '$id' ORDER BY opt.Opt_ID";	
	
		$res1 = $conn->query($sql2);
		$count = 0;
					
		while ($row = mysqli_fetch_assoc($res1)) {
			
			$count = $count +1;
			
				echo '<input type="hidden" id='. $count.'   value="'. $row['Add_Rec'].''. $row['Edit_Rec'].''. $row['View_Rec'].'">';
						
		  						
			}
			echo '<input type="hidden" id="count"  value="'.$count.'">';
	
					
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
        	
           <form name = "frmMain" id = "frmMain"  action = "..\dbupdate\editgroup_update.php"  method = "post">
	<table>

	<tr >
		<th colspan="2">Edit User Groups</th>
		
	</tr>
	<tr>
		<td>User ID :</td>
		<td><input type="text" name="id" id="id" value="" readonly><a href="#" onClick="searchClick();"><i class="ri-search-2-line"></i></td>
	</tr>
	
	<tr>
		<td>Group Name 	:</td>
		<td><input type="text" size="25" name="name" id="name" required ></td>
	</tr>
	
		<tr>
		<td>Description	:</td>
		<td><input type="text" size="25" name="dis" id="dis" required ></td>
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
			$sql = "SELECT `Opt_ID`,`Description`,`order` FROM `system_options` WHERE `isActive` = 1 order BY `Opt_ID`";
			$res = $conn->query($sql);
			while ($row = mysqli_fetch_assoc($res)) {
			
					
					$cre = $row['Opt_ID'] . "CR";
					$edi = $row['Opt_ID'] . "ED";
					$vie = $row['Opt_ID'] . "VI";
  						
  						echo '<tr>';
						echo '<td>'. $row['Description'] .'</td>';
						echo '<td><input type="checkbox" value="1" name = "'. $cre .'" id="'. $cre .'"></td>';
						echo '<td><input type="checkbox" value="1" name = "'. $edi .'" id="'. $edi .'"></td>';
						echo '<td><input type="checkbox" value="1" name = "'. $vie .'" id="'. $vie .'"></td>';
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
                        <td><input type="hidden" name="sea_click" id="sea_click" value="0"></td>
                        <td><input type="submit" size="20" name="sub" value="Save" align="left" class="btn btn-danger" ></td>
                     </tr>
                     </table>
            </div>
          </form> 

           
        </div>
    </section>
        </section>
    <script>
       	fillGroupDetails()
    </script>

</body>
</html>