<?php 
 
 //configuration
 require('../includes/config.php');
 
 //if user reach page via GET i.e. by clicking the link or redirect
  if($_SERVER["REQUEST_METHOD"]== "GET")
   {
      //then render to register.php
      render("register_form.php",["title"=>"register"]);
   }
      
  
  //if user reach form via POST (submitting form via post)
  else if($_SERVER["REQUEST_METHOD"]=="POST")
  {  
     //Form required field validation
     foreach($_POST as $key=>$value)
     {
        if(empty($_POST[$key]))
         {
           $message = ucwords($key)." field is required.";
           break;
         }
      }
      
     
     // Email Validation 
     if(!isset($message))
     {
       if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        $message = "Invalid User Email";
     }
     
     //Password Matching Validation
     if($_POST['password']!=$_POST['confirm_password'])
      {
        $message = "Password should be same<br>";
      }            
      
     //Validation to check if college is selected
     if(!isset($message))
     {
       if(!isset($_POST['college']))
       {
         $message = "College field is required";
       }
       
     }
      
     //Validation to check if gender is selected
     if(!isset($message))
     {
       if(!isset($_POST['Gender']))
       {
         $message = "Gender field is required";
       }
     }      
           
     else 
     {
        $cid = mysql_query('SELECT Cid FROM College where name = ?',$_POST["college"]);
     
        // If user already exists
       if(mysql_query("INSERT IGNORE INTO Account (Name, email, password, gender, Cid) VALUES (?, ?, ?,?,?)",htmlspecialchars($_POST['name']),$_POST['email'],crypt($_POST['password']),$_POST['Gender'],$cid[0]["Cid"])=== false)
        {
          $message = "Username already exist";
               
        }
        
        else
        {
           //new user inserted into database
           $rows = mysql_query("SELECT LAST_INSERT_ID() AS id");
           $id = $rows[0]["Uid"];
           $_SESSION["id"]= $id;
           redirect("index.php");
         }
      }         
  }
  
 ?>
