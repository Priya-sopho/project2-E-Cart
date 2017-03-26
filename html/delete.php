<?php
 /*** This is to delete an item table content **/
   require_once("../includes/config.php");

  // Considering Category and College as variable to decide the store view
  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
    //To remove item
    mysql_query("DELETE FROM Item where I_id = $id") or die(mysql_error());
  }    
  
  redirect('portfolio.php');
