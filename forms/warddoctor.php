<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styletest.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
			var inputField = document.getElementById("sea_click");     
            inputField.value = "1";
			window.open('serachForms/patientsearch.php','ChildWindow','status=no','menubar=no','location=no','resizable=no','scrollbars=no','1','width =500,height=500');
			
		
		}
		
		
		function fillEmpDetails(){
			
			var mySelect1 = document.getElementById("tit"); 		
			mySelect1.selectedIndex = parseInt(document.getElementById('Title').value);
				
			
		  	mySelect1 = document.getElementById("gen"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Gender').value);
		
			mySelect1 = document.getElementById("citzip"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Ctz_ID').value);
		
		
			mySelect1 = document.getElementById("rel"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Reg_ID').value);
		
			mySelect1 = document.getElementById("matsta"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Mat_ID').value);
			
			mySelect1 = document.getElementById("cti"); 
			mySelect1.selectedIndex = parseInt(document.getElementById('Cit_ID').value);

			

			
			document.getElementById('id').value = document.getElementById('Pat_ID').value;
			document.getElementById('fname').value = document.getElementById('First_Name').value;
			document.getElementById('mname').value = document.getElementById('Middle_Name').value;
			document.getElementById('lname').value = document.getElementById('Last_Name').value;		
			document.getElementById('ad1').value = document.getElementById('Add1').value;
			document.getElementById('ad2').value = document.getElementById('Add2').value;
			document.getElementById('ad3').value = document.getElementById('Add3').value;
			document.getElementById('nic').value = document.getElementById('NIC_Passport').value;
			
			//document.getElementById('mob').value = document.getElementById('land').value;
			//document.getElementById('email').value = document.getElementById('ema').value;
			
			
			var dateString = document.getElementById('DOB').value;	
			var dateObj = new Date(dateString);
			var formattedDate = dateObj.toISOString().split('T')[0];
			document.getElementById("dob").value = formattedDate;
		
		
			var dateString_1 = document.getElementById('Reg_Date').value;	
			var dateObj_1 = new Date(dateString_1);
			var formattedDate_1 = dateObj_1.toISOString().split('T')[0];
			document.getElementById("jdate").value = formattedDate_1;

			
			
			
		
		/*	var mySelect2 = document.getElementById("pa"); 
			mySelect2.selectedIndex = parseInt(document.getElementById('h_par').value);
			
			var mySelect2 = document.getElementById("cl"); 
			mySelect2.selectedIndex = parseInt(document.getElementById('h_stcl').value);
		
			var mySelect2 = document.getElementById("ho"); 
			mySelect2.selectedIndex = parseInt(document.getElementById('h_hou').value);
			
			var mySelect2 = document.getElementById("me"); 
			mySelect2.selectedIndex = parseInt(document.getElementById('h_med').value);
		
				
		
			
		
			
	
	*/
	}


	</script>

 	  	
 	<script>
 	 
    	function addRow() {
    
                
            var che = document.getElementById("getID");
	        var v = parseInt(che.value);
	        
	        var dcou = document.getElementById("doc_count");
	        var did = parseInt(dcou.value);
			var addNoAdd = 1;

            for (let i = 0; i < did ; i++) {
            	var j = i + "ID";
            	var dcou = document.getElementById(j);
	        	var tv = parseInt(dcou.value);
     			
     			if(v == tv){
     				addNoAdd =0;
     			}
    			
			}
				
    
	    	var table = document.getElementById("doctor");
	    	var row = table.insertRow(table.rows.length);

	        
	        var id1 = did + "ID";
	        var id2 = did + "CA";
	        var id3 = did + "TI";
            var id4 = did + "FN";
            var id5 = did + "LN";
             
          	var na = document.getElementById("name");
          	var inputValue = na.value;
			var id = inputValue;	
			
	    
	        var cell = row.insertCell(0);
	        var input = document.createElement("input");
	        input.type = "text";
	        input.id = id1;
	        input.name = id1;
	        input.readOnly = true;
	        cell.appendChild(input);
	        
	        
	       	var cell = row.insertCell(1);
	        var input = document.createElement("input");
	        input.type = "text";
	        input.id = id2;
	        input.name = id2;
	        input.readOnly = true;
	        cell.appendChild(input);
	        
	       	var cell = row.insertCell(2);
	        var input = document.createElement("input");
	        input.type = "text";
	        input.id = id3;
	        input.name = id3;
	        input.readOnly = true;
	        cell.appendChild(input);
	        
			var cell = row.insertCell(3);
	        var input = document.createElement("input");
	        input.type = "text";
	        input.id = id4;
	        input.name = id4;
	        input.readOnly = true;
	        cell.appendChild(input);
	        
	       	var cell = row.insertCell(4);
	        var input = document.createElement("input");
	        input.type = "text";
	        input.id = id5;
	        input.name = id5;
	        input.readOnly = true;
	        cell.appendChild(input);
    	
    	
		    var deleteButtonCell = row.insertCell(5);
		    var deleteButton = document.createElement("button");
		    deleteButton.innerHTML = "Delete";
		    deleteButton.setAttribute("onclick", "deleteRow(this)");
		    deleteButtonCell.appendChild(deleteButton);
		    
		   	
		    
		     $.ajax({
                type: "GET",
                url: "getDocID.php",
                success: function(response) {
                    $('#'+id1).val(response);                
                    $('#doc_count').val(did +1);
                    return response; 
                }
            });
            
           	$.ajax({
                type: "GET",
                url: "getDocCat.php",
                success: function(response) {
                    
                    $('#'+id2).val(response); 
                   
                    return response; 
                }
            });
            
            $.ajax({
                type: "GET",
                url: "getDocTit.php",
                success: function(response) {
                    
                    $('#'+id3).val(response); 
                    
                    return response; 
                }
            });
            
            $.ajax({
                type: "GET",
                url: "getDocfName.php",
                success: function(response) {
                    
                    $('#'+id4).val(response); 
                    
                    return response; 
                }
            });


 			$.ajax({
                type: "GET",
                url: "getDoclName.php",
                success: function(response) {
                    
                    $('#'+id5).val(response); 
                    
                    return response; 
                }
            });

	

	
		    
		   
	}

	function deleteRow(button) {
	    var row = button.parentNode.parentNode;
	    row.parentNode.removeChild(row);
	}

    
    </script>

 	
 	<script>
		function searchClickDoctor(id) {
			var inputField = document.getElementById("sea_click");     
            inputField.value = "1";
			window.open('serachForms/warddocsearch.php','ChildWindow','status=no','menubar=no','location=no','resizable=no','scrollbars=no','1','width =500,height=500');
				
		}
		
		function searchClickNurse() {
			var inputField = document.getElementById("sea_click");     
            inputField.value = "1";
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
          <form name = "frmMain" id = "frmMain"  action = "..\dbupdate\create_ward_update.php"  method = "post" >
			<table>
				<tr >
					<th colspan="2">Word Doctor</th>
					
				</tr>
				<tr>
					<td>Patient ID :</td>
					<td><input type="text" id="name" name="name" required> <a href="#" onClick="searchClick();"><i class="ri-search-2-line"></i></td>
					<td colspan="2"><input type="text" id="name" name="name" size="60" required><br></td>
				</tr>
			
				
				<tr>
					<td>Gender :</td>
					<td><input type="text"  name="des" readonly=""></td>
					<td>Age</td>
					<td><input type="text"  name="des" readonly></td>
				</tr>
				
				<tr>
					<td>Height :</td>
					<td><input type="text"  name="des" readonly></td>
					<td>Weight</td>
					<td><input type="text"  name="des" readonly></td>
				</tr>
				
				<tr>
					<td>Bed Count :</td>
					<td><input type="Number" id="count" name="count" size="50" ><br></td>
					<td></td>
					<td></td>

				</tr>
			
			
				<tr>
					<td>Select Ward Doctors/Nurses</td>
					<td><a href="#" onClick="searchClickDoctor(4);"><i class="ri-search-2-line"></i></a></td>
				</tr>
				<tr>
					<td colspan="4">
						<table id="doctor">
						<tr>
							<td>Doctor/Nurse ID</td>
							<td>Category</td>
							<td>Title</td>
							<td>First Name</td>
							<td>Last Name</td>
						</tr>
					</table>
	
					</td>
					
				</tr>
				<tr>
					<td><input type="hidden" name="sea_click" id="sea_click" value="0"><input type="hidden" name="doc_count" id="doc_count" value="0"><input type="hidden" name="getID" id="getID" value="0"></td>
					<td> <input type="submit"  value="Save" name="submit" class="btn btn-danger"></td>
				</tr>
			
			
			</table>          
        </div>
    </section>
    
    
 
	<script>
	 	window.addEventListener('focus', function() {
	          
	        var inputField = document.getElementById("sea_click");
	            var inputValue = inputField.value;             
	           
	            if(inputValue == "1"){          	
	            	addRow();       	
	            	
	            }  
	            
	            inputField.value = 0;
	    
		});
	
	
	</script>




</body>
</html>