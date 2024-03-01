<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styletest.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script type="text/javascript" src="js/stm.js"></script>
    <title>Dashboard</title>
    
      

    
</head>
<body background="../images/xxx.jpg">

     <?php 
		session_start();
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    		
    		
    		
		} else{
			header('Location: \HMSystem\forms\login.php');
			exit;
		}
		
 		 				
 	?>

    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>HM<span>PC</span></h2>
        </div>
        <div class="search--notification--profile">
            <div class="search">
                <input type="text" placeholder="Search ..">
                <button><i class="ri-search-2-line"></i></button>
            </div>
            <div class="notification--profile">
                <div class="picon lock">
                    <i class="ri-lock-line"></i>
                </div>
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                </div>
                <div class="picon chat">
                    <i class="ri-wechat-2-line"></i>
                </div>
                <div class="picon profile">
                    <img src="images/profile.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
            
            <?php 
            	include '../dbupdate/dbcon.php';
				//$user = $_SESSION['user'];
				$sql = "SELECT `Description`,`path` FROM `system_options` WHERE `isActive` =1";
				$res = $conn->query($sql);
					while ($row = mysqli_fetch_assoc($res)) {
  						
  						echo '<li>';
						echo '<a href= \' ' . $row['path'] . ' \'>';
						echo '<span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>';
						echo '<span class="sidebar--item">' . $row['Description'] . '</span>';
			
				}
			?>
                
		
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                 
                    <a href="#">
                        <span class="ico
                        n icon-7"><i class="ri-settings-3-line"></i></span>
                        <span class="sidebar--item">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--content" id= "con">
           <form name = "frmMain" id = "frmMain"  action = "dbupdate\creatuser_update.php"  method = "post" onsubmit="JavaScript:return test();">
<table>

	


	<tr >
		<th colspan="2">Creare User</th>
		
	</tr>
	<tr>
		<td style="width: 165px">User ID :</td>
		<td>
		
		<?php
		include '../dbupdate/dbcon.php';
		
		$sql = "SELECT MAX(`ID`) AS id FROM `system_user`";
					
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
		<td>User Name 	:</td>
		<td><input type="text" size="25" name="user" required ></td>
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
			<select name="emp" required >
				<option value="" selected="selected" required>Select Employee</option>
				<?php
					include '../dbupdate/dbcon.php';
					$sql = "SELECT em.Emp_ID,em.First_Name,ho.name FROM employee_master as em, hospital AS ho WHERE em.Hos_ID = ho.Hos_ID";
					
					$res = $conn->query($sql);
					
					while ($row = mysqli_fetch_assoc($res)) {
  						echo '<option value="' . $row['Emp_ID'] . '">' . $row['First_Name'] .' -- '.$row['name']. '</option>';
					}
	
					
					$conn->close();
				
				?>
				
				
		</select>
	
		</td>
	</tr>

	<tr>
		<td>User Group</td>
		<td>
			<select name="gru" required >
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
		<td></td>
		<td><input type="submit" size="20" name="sub" value="Save" align="left" class="btn btn-danger" ></td>
	</tr>	
	


</table>
</form>

        </div>
    </section>
    <script src="assets/js/main.js"></script>
    

    
</body>
</html>