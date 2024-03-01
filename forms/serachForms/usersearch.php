<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search User</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    	function setSessionVariable(id) {
    	var sectionValue = id; // Specify the section value you want to set

    // Send an AJAX request to the server-side script to set the session variable
	    $.ajax({
	        url: "set_session.php",
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


function myClose(id) {
	
	setSessionVariable(id) 	 		
  	window.close();
  			
}


    
    </script>



  <script>	
    $(document).ready(function(){
   $('#getName').on("keyup", function(){
     var getName = $(this).val();
     $.ajax({
       method:'POST',
       url:'userearchajax.php',
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
    
    <h6 class="mt-5"><b>Search User</b></h6>
    <div class="input-group mb-4 mt-3">
         <div class="form-outline">
            <input type="text" name="getName" id="getName"/>
        </div>
    </div>                   
    <table class="table table-striped">
        <thead>
          <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Group</th>
          </tr>
        </thead>  
	     
        <tbody id="showdata">
          <?php  
                $sql = "SELECT us.ID,us.Use_ID,gr.Description FROM system_user AS us , system_user_groups AS gr WHERE us.Gro_ID = gr.Gro_ID";
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($query))
                {
                  echo"<tr>";
                   echo"<td><h6><a href=# onclick=myClose(".$row['ID'].");>".$row['ID']." </a></h6></td>";
                   echo"<td><h6>".$row['Use_ID']."</h6></td>";
                   echo"<td>".$row['Description']."</td>";
                  echo"</tr>";   
                }
                
                $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>