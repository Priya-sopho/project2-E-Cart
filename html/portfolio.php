<?php
  
 /***
  ** This is the controller to  display store item by a specific user
  **/
 
 require("../includes/config.php");
 $id = $_SESSION["id"];
  $rows = mysql_query("SELECT I_id, Image, Title, Description, Price FROM Item WHERE Uid = $id");

    
    $positions = [];
    while ($row = mysql_fetch_assoc($rows))
    {
      $positions[] = [
         "id" => $row["I_id"],
        "image" => $row["Image"],
        "title" => $row["Title"],
        "description" => $row["Description"],
        "price" => $row["Price"]
        ];
        
    }
    
    // render portfolio
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio"]);
?> 
