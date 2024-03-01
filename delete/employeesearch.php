<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Items</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styletest.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
<?php
include('../../dbupdate/dbcon.php')
?>
<div class="container mt-4">
    
    <h6 class="mt-5"><b>Search Employee</b></h6>
    <div class="input-group mb-4 mt-3">
         <div class="form-outline">
            <input type="text" name="getName" id="getName"/>
        </div>
    </div> 
  
                  
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th><input type="text" name="getName" id="getName"/>  </th>
          </tr>
        </thead>
        <tbody id="showdata">
          <?php  
                $sql = "SELECT `Emp_ID`,`First_Name`,`Last_Name` FROM `employee_master` WHERE `isActive` =1";
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($query))
                {
                  echo"<tr>";
                   echo"<td><h6><a href=# onclick=window.close();>".$row['Emp_ID']." </a></h6></td>";
                   echo"<td><h6>".$row['First_Name']."</h6></td>";
                   echo"<td>".$row['Last_Name']."</td>";
                  echo"</tr>";   
                }
            ?>
        </tbody>
    </table>
</div>
<script>
  $(document).ready(function(){
   $('#getName').on("keyup", function(){
     var getName = $(this).val();
     $.ajax({
       method:'POST',
       url:'employeesearchajax.php',
       data:{name:getName},
       success:function(response)
       {
            $("#showdata").html(response);
       } 
     });
   });
  });
</script>
</body>
</html>