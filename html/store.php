<?php

   require_once("../includes/config.php");

  // Considering Category and College as variable to decide the store view
  if(isset($_POST['Category']))
  {
    //To get category id to reference items
    $ca_id = mysql_query('SELECT Ca_id FROM Category where cname = ?',$_POST['Category']);
   
    //All items of required category
    $row = mysql_query('SELECT * FROM ITEM where Ca_id = ?', $ca_id[0]['Ca_id']);
    
    //To render store view
    render("store.php",["tilte" => "store", "rows"=> $row]);
   }
   
  else if (isset($_POST['College']))
  {
     // To get college id to reference items
     $cid = mysql_query('SELECT Cid FROM College where name = ?',$_POST['College']); 
     
     //All items from required college
     $row = mysql_query('SELECT * FROM Item where Cid = ?',$cid[0]['Cid']);
     
     render("store.php",["tilte" => "store", "rows"=> $row]);
   }
   
   else
   {
     //Select all items
     $row = mysql_query('SELECT * FROM Item');
     
     render("store.php",["tilte" => "store", "rows"=> $row]);
   }
   
?>        
     
   
    
