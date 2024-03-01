<?php 
  include('../../dbupdate/dbcon.php');
  
   $name = $_POST['name'];
  
 
   $sql = "SELECT `Wor_ID`,`Description`,`Memo` FROM `wards` WHERE `Description` LIKE '%$name%'";
   //$sql = "SELECT `ID`,`Use_ID` FROM `system_user` WHERE `Use_ID` LIKE '$name%'";

   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr><td><a href=# onclick=myClose(".$row['Wor_ID'].");>".$row['Wor_ID']." </a></td><td>".$row['Description']."</td><td>".$row['Memo']."</td></tr>";
   }
    echo $data;
 ?>