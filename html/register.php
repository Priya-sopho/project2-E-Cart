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
     
     $message = "";
     
     //Form required field validation
     foreach($_POST as $key=>$value)
     {
        if(empty($_POST[$key]))
         {
           $message = ucwords($key)." field is required.";
           break;
         }
      }
      
     
    
     if(empty($message))
     { 
       // Email Validation 
       if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        $message = "Invalid User Email";
     
     
     //Password Matching Validation
     elseif($_POST['password']!=$_POST['confirm_password'])
      {
        $message = "Password should be same";
      }             
           
           
     else 
     {
          
        $clg = mysql_real_escape_string($_POST["college"]);
        $cid = mysql_fetch_assoc(mysql_query("SELECT Cid FROM College where name = '$clg'"));
        $cid = mysql_real_escape_string($cid["Cid"]);
        $name = mysql_real_escape_string($_POST["name"]);
        $email = mysql_real_escape_string($_POST["email"]);
        $pswd = mysql_real_escape_string(crypt($_POST["password"]));
        $g = $_POST["gender"];   
        
        // If user already exists
      if( mysql_query("INSERT  INTO Account (Name, email, password, gender, Cid) VALUES ('$name','$email','$pswd','$g','$cid')")=== false) 
      
        {
            $message = "Username already exist";
               
        }
        
       else
        {
           //new user inserted into database
           $rows = mysql_query("SELECT LAST_INSERT_ID() AS Uid") or die(mysql_error());
           $row = mysql_fetch_assoc($rows);
           $_SESSION["id"] = $row["Uid"];         

           redirect("portfolio.php");
         }
      }
  }          
  }
  apologize($message);   
  
 ?>
