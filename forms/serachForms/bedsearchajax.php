<?php 
  include('../../dbupdate/dbcon.php');
  
   $name = $_POST['name'];
  
 
   $sql = "SELECT bed.Bed_ID,war.Description AS ward, typ.Description AS type FROM `bed` AS bed , wards AS war, bed_types AS typ  WHERE (bed.Wor_ID = war.Wor_ID  AND bed.Bed_Typ_ID = typ.Bed_Typ_ID) AND (`Bed_ID` LIKE '%$name%' OR war.Description LIKE '%$name%' OR typ.Description LIKE '%$name%')";


   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr><td><a href=# onclick=myClose(".$row['Bed_ID'].");>".$row['Bed_ID']." </a></td><td>".$row['type']."</td><td>".$row['ward']."</td></tr>";
   }
    echo $data;
 ?>