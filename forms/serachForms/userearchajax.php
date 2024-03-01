<?php 
  include('../../dbupdate/dbcon.php');
  
   $name = $_POST['name'];
  
 
   $sql = "SELECT us.ID,us.Use_ID,gr.Description FROM system_user AS us , system_user_groups AS gr WHERE us.Gro_ID = gr.Gro_ID AND `Use_ID` LIKE '$name%'";
   //$sql = "SELECT `ID`,`Use_ID` FROM `system_user` WHERE `Use_ID` LIKE '$name%'";

   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr><td><a href=# onclick=myClose(".$row['ID'].");>".$row['ID']." </a></td><td>".$row['Use_ID']."</td><td>".$row['Use_ID']."</td></tr>";
   }
    echo $data;
 ?>