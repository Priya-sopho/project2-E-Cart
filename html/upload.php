<?php
 
  if(empty($_FILES["image"]))
   {
     apologize("Choose a file to upload");
   }  
 
 $target_dir = "uploads/";
 $target_file = $target_dir.basename($_FILES["image"]["name"]);
 $imgType = pathinfo($target_file,PATHINFO_EXTENSION);
 
 //To check file is actual image file or fake image
 
   $check = getimagesize($_FILES["image"]["tmp_name"]);
   if($check !== false)
 {       
    //Check if file already exists
   if(file_exists($target_file))
   {
     apologize("Sorry File already exist"); 
   }
   
   
   //Allow only certain file type
   if($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg" && $imgType != "gif")
   { 
       apologize("Sorry your file was not of correct type. It should be either jpg, png, jpeg or gif");
   }
   
   //if everything is ok, try to upload file
   if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file))
   {
      $image = $target_file;         
    }  
   else
   {
      apologize("Sorry, there was an error while uploading your file.");
   }
  } 
   
 ?>      
