<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Employee</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    	function setSessionVariable(id) {
    	var sectionValue = id; 
    	
	    $.ajax({
	    
	        url: "set_session1.php",
	        type: "POST",
	        data: { section: sectionValue },
	        success: function(response) {
	            console.log("Session variable set successfully");
	        },
	        error: function(xhr, status, error) {
	            console.error("Error setting session variable:", error);
	        }
	    });  
	    
		}
			
		
		function setDocNurseSession(id,cat,tit,fname,lname){
			    var dataToSend = {
                    docnusid: id,
                    cat: cat,
                    tit: tit,
                    fname: fname,
                    lname: lname
                };

                $.ajax({
                    type: "POST",
                    url: "set_session_Doc_Nur.php",
                    data: dataToSend,
                    success: function(response){
                        alert(response);
                    }
                });
		
		
		}
		
		


		function myClose(id,cat,tit,fname,lname) {		
			setDocNurseSession(id,cat,tit,fname,lname); 				
		  	window.close();		  			
		}
		
		
	$(document).ready(function(){
   		$('#getName').on("keyup", function(){
     	var getName = $(this).val();
     	$.ajax({
       	method:'POST',
       	url:'warddocsearchajax.php',
       	data:{name:getName},
       	success:function(response)
       {
        $("#showdata").html(response);
       } 
     });
   });
  });
	
   
    </script>

	
</head>

<body>
<?php include('../../dbupdate/dbcon.php')?>

<div class="container mt-4">
    
    <h6 class="mt-5"><b>Search Ward Doctors/Nurses</b></h6>
    <div class="input-group mb-4 mt-3">
         <div class="form-outline">
            <input type="text" name="getName" id="getName"/>
        </div>
    </div>                   
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Doctor/Nurse ID</th>
            <th>Category</th>
            <th>Title</th>
            <th>First Name</th>
            <th>Last Name</th>
          </tr>
        </thead>  
	     
        <tbody id="showdata">
          <?php  
                $sql = "SELECT emp.Emp_ID,typ.Description,tit.Description AS tit, emp.First_Name , emp.Last_Name FROM employee_master AS emp , employee_types AS typ, Title AS tit WHERE emp.Emp_Typ_ID = typ.Emp_Typ_ID AND tit.Tit_ID = emp.Title AND (emp.Emp_Typ_ID = 4 OR emp.Emp_Typ_ID = 5)";
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($query))
                {
                
               
                $arg1 =(string)$row['Emp_ID'];
                $arg2 =$row['Description'];
                $arg3 =$row['tit'];
                $arg4 =$row['First_Name'];
                $arg5 =$row['Last_Name'];
                
                
                   echo"<tr>";
                   echo"<td><h6><a href=# onclick=myClose('$arg1','$arg2','$arg3','$arg4','$arg5');>".$row['Emp_ID']." </a></h6></td>";
                   echo"<td><h6>".$row['Description']."</h6></td>";
                   echo"<td>".$row['tit']."</td>";
                   echo"<td>".$row['First_Name']."</td>";
                   echo"<td>".$row['Last_Name']."</td>";
                  echo"</tr>";   
                }
                
                $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>