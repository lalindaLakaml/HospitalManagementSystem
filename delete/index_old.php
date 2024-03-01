<!DOCTYPE html>
<html>
<head>
	<title>Hospital And Patient Management System</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/stm.js"></script>
		
<?php
	session_start(); 
?>
 

</head>

<body  background="images/background.jpg">

	<header>
	<div style="display: flex; justify-content: space-between;">
	<div width: 50%;"><h1>Hospital And Patient Management System</h1></div>
	<div width: 20%;"></div>
	<div width: 20%;" style="padding-right:30px">
	
	<?php 
	
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    		echo "Welcome to HPMS, " . htmlspecialchars($_SESSION['username']) . "!";
    		
		} else {
    		echo "Please log in first to see this page."; 	
		}
	
 		 				
 		?>
 		
 		<button class="btn btn-danger" onclick="loadPhp('forms/Login.php')" >Login</button>
 		<a href="http://localhost/HMS/forms/logout.php"><button class="btn btn-danger" >Logout</button></a>
 	</div>
</div>		
		
	</header>
	<aside>
	<?php 
	
	/*	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    		echo '<button class="btn btn-danger" onclick="loadPhp(\'forms/Login.php \')" >Login</button>	
				  <button class="btn btn-danger" onclick="loadPhp(\'forms/logout.php \')">Logout</button>';
		} else {
    		echo '<button class="btn btn-danger" onclick="loadPhp(\'forms/Login.php \')" >Login</button>	
				  <button class="btn btn-danger" onclick="loadPhp(\'forms/logout.php \')">Logout</button>';
	
		} */
	
 		 					
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    		include 'forms\dbcon.php';
			$user = $_SESSION['user'];
			$sql = "SELECT ope.Description AS des , ope.path As pa FROM system_user AS us, system_user_groups AS gr , system_group_permission AS grp , system_options AS ope WHERE us.Gro_ID = gr.Gro_ID AND grp.Opt_ID = ope.Opt_ID AND us.Use_ID = 1";
			        
			$res = $conn->query($sql);
			while ($row = mysqli_fetch_assoc($res)) {
  						echo '<button class="btn btn-danger" onclick="loadPhp(\' ' . $row['pa'] . ' \')">' . $row['des'] . '</button>';
						

			}
		} 
	
	?>

	
	
	</aside>
	<div class="content" id="con">
		<?php
		
		if (isset($_GET['s'])) {
		  $st =  $_GET['s'];
			if($st == 'g'){
				echo '<h2 ><p style="color: green;">The record is Successfully updated</p></h2>';
			}else if($st == 'f'){
				echo '<h2 ><p style="color: red;">The record is Not Successfully updated</p></h2>';
				
			}else if($st == 'lg'){
				echo '<h2 ><p style="color: green;"> Successfully Login</p></h2>';

			} else if($st == 'lf'){
				echo '<h2 ><p style="color: red;"> Not successfully Login</p></h2>';
			}
		} else {
		
		}
		
		
			

		?>
 		

	</div>
	
	<footer>
		<p>MIT - University of Kelaniya &copy; 2023</p>
	</footer>
	
</body>
</html>