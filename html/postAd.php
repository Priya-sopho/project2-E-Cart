<?php 
  /***This to validate advertisement and 
    add to db if validated  ***/
     
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
       render("login.php",["title"=>"login"]);
       } 
     
     //Form required field validation
     foreach($_POST as $key=>$value)
     {
        //Image field is not a required field
        if($key == "image")
         continue;
        if(empty($_POST[$key]))
         {
           if($key == "price" && $_POST["choice"] == "donate")
            {  
             //Validation to check if donation
               if($_POST['price']>0)
                {
                apologize("If you want to donate set price to 0");
                }
                else
                 $_POST['price'] = 0;
            }       
           else     
            {
              apologize(ucwords($key)." field is required.");
              break;
            }  
         }
      }
      
     
     
    
    //Validation to check amount      
    if($_POST['choice']== "sell" && !is_numeric($_POST['price']))
       {
         apologize("Enter amount in numerals");
        }
         
  else 
  
   {
        //To get Category id
        $Ca_id = $_POST["category"];
        
        //User id
        $id = $_SESSION["id"];
       
               
        //To insert while preventing sql injection
       $title = mysql_real_escape_string($_POST["title"]);
       $desc = mysql_real_escape_string($_POST["description"]);
       $contact = mysql_real_escape_string($_POST["contact"]);
       $price = $_POST["price"];
       
       
       //For image processing
       if(empty($_FILES)|| !isset($_FILES['image']))
       {
           $image = "";
        }
        
        else
       {  $target_dir = "uploads/";
          $target_file = $target_dir . basename($_FILES["image"]["name"]);
          $uploadOk = 1;
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
          } else {
            $image = "";
          echo "Sorry, there was an error uploading your file.";
          }
        }
       
    
       //Insert into item table
      if( mysql_query("INSERT IGNORE INTO Item (Title, Description, Uid, Ca_id, Contact, Price, Image) 
            VALUES ('$title','$desc',$id,$Ca_id,'$contact',$price ,'$image')") === false ) 
       {
           die(mysql_error());
          apologize("Ad wasn't posted successfully");
        }
          
       
        else
        {
          redirect("index.php");
        } 
      }         
  }
  
 ?>
