<?php 
  include('../../dbupdate/dbcon.php');
  
   $name = $_POST['name'];
  
 
   $sql = "SELECT emp.Emp_ID,typ.Description,tit.Description AS tit, emp.First_Name , emp.Last_Name FROM employee_master AS emp , employee_types AS typ, Title AS tit WHERE emp.Emp_Typ_ID = typ.Emp_Typ_ID AND tit.Tit_ID = emp.Title AND (emp.Emp_Typ_ID = 4 OR emp.Emp_Typ_ID = 5) AND (`First_Name` LIKE '%$name%' OR `Last_Name` LIKE '%$name%')";

   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
   
   	            $arg1 =(string)$row['Emp_ID'];
                $arg2 =$row['Description'];
                $arg3 =$row['tit'];
                $arg4 =$row['First_Name'];
                $arg5 =$row['Last_Name'];

       $data .=  "<tr><td><a href=# onclick=myClose('$arg1','$arg2','$arg3','$arg4','$arg5');>".$row['Emp_ID']." </a></td><td>".$row['Description']."</td><td>".$row['tit']."</td><td>".$row['First_Name']."</td><td>".$row['Last_Name']."</td></tr>";
   }
    echo $data;
 ?>