<?php 
  include('../../dbupdate/dbcon.php');
  
   $name = $_POST['name'];
  
 
   $sql = "SELECT `Pat_ID`,`First_Name`,`Last_Name` FROM `patient_master` WHERE `isActive` = 1 AND ( `First_Name` LIKE '$name%' OR `Last_Name` LIKE '$name%')";

   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr><td><a href=# onclick=myClose(".$row['Pat_ID'].");>".$row['Pat_ID']." </a></td><td>".$row['First_Name']."</td><td>".$row['Last_Name']."</td></tr>";
   }
    echo $data;
 ?>