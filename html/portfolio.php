<?php
  
 /***
  ** This is to display store item by a specific user
  **/
 
 require("../includes/config.php");
 
  $rows = mysql_query("SELECT Image, Title, Description, Price FROM Item WHERE Uid = ?", $_SESSION["id"]);
    
    $positions = [];
    while ($row = mysql_fetch_assoc($row))
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
