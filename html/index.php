<?php 
  require("../includes/config.php");
  echo "Hello";
  //To check connection

  $row = mysql_query('Select * from College');
  if(!$row)
  echo "Error!";
  else
  {
   while($r=mysql_fetch_assoc($row))
  {
    echo '<br>'.$r["Cid"].' ';
    echo $r["Name"];
  }
 }   
?>  
