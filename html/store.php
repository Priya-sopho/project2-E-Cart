<?php
 /*** This is to send view the item table contents on the basis of filters**/
   require_once("../includes/config.php");

  // Considering Category and College as variable to decide the store view
  if(isset($_POST['Category']))
  {
    $category = $_POST['Category'];
    //To get category id to reference items
    $row = mysql_fetch_assoc(mysql_query("SELECT Ca_id FROM Category where cname = '$Category'"));
    $ca_id = $row['Ca_id'];
    
    //All items of required category
    $row = mysql_query("SELECT * FROM ITEM where Ca_id = $ca_id");
    
    //To render store view
    render("store.php",["tilte" => "store", "rows"=> $row]);
   }
   
  else if (isset($_POST['College']))
  {
     
     // To get college id to reference items
     $cid = $_POST['College']; 
     
     //All items from required college
     $row = mysql_query("SELECT * FROM Item where Cid = '$cid'");
     
     render("store.php",["tilte" => "store", "rows"=> $row]);
   }
   
   else
   {
     //Select all items
     $row = mysql_query('SELECT * FROM Item');
     
     render("store.php",["tilte" => "store", "rows"=> $row]);
   }
   
?>        
     
   
    
