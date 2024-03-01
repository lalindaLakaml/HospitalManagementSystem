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
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <title>Dashboard</title>
    
    
</head>
<body>

    <?php
		session_start();
		$_SESSION['search'] = 'Search for';
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
            	include 'dbcon.php';
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
           <div class="container mt-4">
    
    <h6 class="mt-5"><b>Search Hospital</b></h6>
    <div class="input-group mb-4 mt-3">
         <div class="form-outline">
            <input type="text"   id="getName"/>
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
                   echo"<td><h6><a href=# onclick=addRow(".$row['Hos_ID'].");>".$row['Hos_ID']." </a> </h6></td>";
                   echo"<td><h6>".$row['name']."</h6></td>";
                   echo"<td>".$row['Description']."</td>";
                  echo"</tr>";   
                }
            ?>
        </tbody>
    </table>
</div>

<table id="myTable">
    <thead>
        <tr>
            <th>Header 1</th>
            <th>Header 2</th>
            <th>Header 3</th>
        </tr>
    </thead>
   
</table>



<script>
    function addRow(fis) {
        // Get the table reference by ID
        var table = document.getElementById("myTable");

        // Create a new row and cells
        var newRow = table.insertRow(table.rows.length);
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);

        // Set the content of the cells (you can customize this part)
        cell1.innerHTML = fis;
        cell2.innerHTML = "<input type='text'   id='getName11'/>";
        cell3.innerHTML = "New Row, Cell 3";
    }
</script>


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

        </div>
    </section>
    <script src="assets/js/main.js"></script>
</body>
</html>