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
include('../dbcon.php')
?>
<div class="container mt-4">
    
    <h6 class="mt-5"><b>Search Hospital</b></h6>
    <div class="input-group mb-4 mt-3">
         <div class="form-outline">
            <input type="text" id="getName"/>
        </div>
    </div>                   
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Hospital ID</th>
            <th>Name</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody id="showdata">
          <?php  
                $sql = "SELECT `Hos_ID`,`name`,`Description` FROM `hospital`";
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($query))
                {
                  echo"<tr>";
                   echo"<td><h6><a href=# onclick=loadForm(".$row['Hos_ID'].");>".$row['Hos_ID']." </a> </h6></td>";
                   echo"<td><h6>".$row['name']."</h6></td>";
                   echo"<td>".$row['Description']."</td>";
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
       url:'hospitalsearchajax.php',
       data:{name:getName},
       success:function(response)
       {
            $("#showdata").html(response);
       } 
     });
   });
  });
</script>

<script>
    function loadForm(itemId) {
      // Open a new window or use a modal to display the PHP form
      // const formWindow = window.open('load_form.php?item_id=' + itemId, '_blank', 'width=600,height=400');
    	alert(itemId);
    	window.close();
    }
  </script>

</body>
</html>