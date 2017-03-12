<?php 
 
 //configuration
 require('../includes/config.php');
 
 //if user reach page via GET i.e. by clicking the link or redirect
  if($_SERVER["REQUEST_METHOD"]== "GET")
   {
      //then render to register.php
      render("postAd.php",["title"=>"postAd"]);
   }
      
  
  //if user reach form via POST (submitting form via post)
  else if($_SERVER["REQUEST_METHOD"]=="POST")
  {  
    //If user is not logged in
    if(!isset($_SESSION["id"]))
     { 
       render("login.php",["title"=>"login"])
       } 
     
     //Form required field validation
     foreach($_POST as $key=>$value)
     {
        //Image field is not a required field
        if($key == "image")
         continue;
        if(empty($_POST[$key]))
         {
           $message = ucwords($key)." field is required.";
           break;
         }
      }
      
     
     //Validation to check if donation
     if(!isset($message))
     {
       if($_POST['donate_or_sell']== "donate" and $_POST['price']>0)
       {
         $message = "If you want to donate set price to 0";
       }
     }      
           
     else 
     {
        //To get Category id
        $ca_id = mysql_query('SELECT Ca_id FROM Category where cname = ?',$_POST["category"]);
       
        //To get college id of the user
        $cid = mysql_query('SELECT Cid FROM Account where Uid = ?', $_SESSION['id']);    

        //Insert into item table
       if(mysql_query("INSERT IGNORE INTO Item (Title, Description, Uid, Ca_id, Contact, Price, Image,Cid) VALUES (?,?,?,?,?,?,?,?)", htmlspecialchars($_POST['title']),htmlspecialchars($_POST['description']),$_SESSION['id'],$ca_id,$_POST['contact'],$_POST['price'],$_POST['image'],$cid[0]['Cid'])===false)
        {
          $message = "Ad wasn't posted successfully";
        }  
       
        else
        {
           redirect("index.php");
         }
      }         
  }
  
 ?>
