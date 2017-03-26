<?php
 /*** This is to send seller contact details **/
 require_once("../includes/config.php");
 if(isset($_GET["id"]))
 {
   $id = $_GET["id"];
   $row = mysql_query("Select * From Item where I_id = $id") or die(mysql_error());
   
   render("seller.php",["title" => "seller", "rows" => $row]);
 }
 
?>   
