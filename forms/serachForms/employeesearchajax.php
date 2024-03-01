<?php 
  include('../../dbupdate/dbcon.php');
  
   $name = $_POST['name'];
  
 
   $sql = "   SELECT `Emp_ID`,`First_Name`,`Last_Name` FROM `employee_master` WHERE `isActive` =1 and `First_Name` LIKE '$name%'";

   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr><td><a href=# onclick=myClose(".$row['Emp_ID'].");>".$row['Emp_ID']." </a></td><td>".$row['First_Name']."</td><td>".$row['Last_Name']."</td></tr>";
   }
    echo $data;
 ?>