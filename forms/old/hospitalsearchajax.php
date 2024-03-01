<?php 
  include("dbcon.php");
  
   $name = $_POST['name'];
  
 
   $sql = "SELECT `Hos_ID`,`name`,`Description` FROM `hospital` WHERE `name` LIKE '$name%'";
   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr><td><a href=# onclick=addRow(".$row['Hos_ID'].");>".$row['Hos_ID']." </a></td><td>".$row['name']."</td><td>".$row['Description']."</td></tr>";
   }
    echo $data;
 ?>