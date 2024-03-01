<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
   	<link rel="stylesheet" href="../css/style.css">
    <title>HMPC - Dashboard</title>
    
    
	<style type="text/css">
	.auto-style1 {
		margin-left: 230px;
		margin-top: 200px;
		margin-bottom: 113px;
	}
	</style>
	
    
</head>

		<?php
		include '../dbupdate/dbcon.php';		
		$sql = "SELECT  `background_image` FROM `settings`";					
		$res = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($res)) {
			
  						echo '<body background="../images/' . $row['background_image'] . '">';
					}	
		
		$conn->close();
		
		?>



    <h1 ><p style="color:white">
    		
    
    <?php 
    	include '../dbupdate/dbcon.php';
		$sql = "SELECT `name` FROM `settings`";
		$res = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($res)) {
		
  						echo $row['name'];
					}	
		
		$conn->close();
		
		?>

    
    </p></h1>
   
   
   
 <form name = "frmMain" id = "frmMain"  action = "..\dbupdate\userlogin.php"  method = "post" >
    
    <table id="myTable" class="auto-style1"  >
    
    		<tr>
   				<th colspan="2"><p style="color:white"> 
   				<?php
    				if (isset($_GET['s'])) {
		  			$st =  $_GET['s'];
			 		if($st == 'lf'){
					echo '<h3 ><p style="color: red;">Login Faild User Name or Password incurrect</p></h3>';
						}
					}
				?>
				</p>
			</th>
   			</tr>

   			<tr>
   				<th colspan="2"><p style="color:white"> System Login From </p></th>
   			</tr>
            <tr><td style="width: 145px">User Name</td>
				<td style="width: 208px">
				<input type="text" id="user" name="user" style="width: 255px"></td></td>
            <tr><td style="width: 145px">Password</td><td style="width: 208px">
				<input type="password" id="pass" name="pass" style="width: 255px"></td></td>
        </tr>
    <tr>
		<td></td>
		<td><input type="submit" size="20" name="sub" value="Login" align="left" class="btn btn-danger" ><br></td>
	</tr>	

   
</table>
</form>
      <?php 
		session_start();
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    		header('Location: \HMSystem\forms\home.php');
    		exit;
    		
		} else{
			
		
		}
		
 		 				
 	?>     
            
</body>
</html>