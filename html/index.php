<?php 
  require("../includes/config.php");
  /*echo "Hello";
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
 }  */ 
 
  $rows = mysql_query("SELECT Image, Title, Description, Price FROM Item WHERE Uid = ?", $_SESSION["id"]);
    
    $positions = [];
    foreach ($rows as $row)
    {
      $positions[] = [
        "image" => $row["Image"],
        "title" => $row["Title"],
        "description" => $row["Description"],
        "price" => $row["Price"]
        ];
        
    }
    
    // render portfolio
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio"]);

?>  
