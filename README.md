# project2
This is my project2 for level 2 phase 4 for SOPHOMORE
A web based application to provide a virtual store for college students to buy and sell their stuff.

Link to video:
    http://www.videosprout.com/video?id=1059edb8-715a-430d-986e-cb1767bb54f6
    
 Design Paradigm : MVC

Files and folders:
  1. html/public : Contains all the controllers and index.php
        Folders: css (Stylesheets)
                 fonts 
                 img (logo.png )
                 js (javascripts)
                 uploads(folder to store images and datapath of required image is stored instead of image)
        Files : delete.php (controller which delete the item from db)
                index.php (main page)
                login.php (controller to ensure authentic login)
                logout.php (controller to logout user)
                portfolio.php(controller which fetch all the item of corresponding user and call the portfolio view)
                postAd.php(controller to validate the Ad and validated one is stored.)
                register.php(controller to validate registration detail and store detail in db,if valid)
                seller.php(controller which fetch seller detail for corresponding item)
                store.php(controller which fetch item data on the basis of filters)
                upload.php(controller which upload the image and provide datapath to store in db)
  2. includes :
       helpers.php (contain helper functions)
       configure.php (contain configuration for db)
  3.models : project2.sql (contain the structure of db to be imported in db)
  4.views : apology.php (to render error messages)
            footer.php (footer for each page)
            front.php(front page)
            header.php (header for each page)
            login_form.php(display login form )
            portfolio.php(display portfolio page)
            postAd.php(form to post Ad)
            register_form.php(form to dispaly registration form)
            seller.php(to display the seller detail for corresponding item)
            store.php(to display the store page)
  5. config.json (for configuration)


To do to run the app on ide after cloning this repo:
 1. update config.json (username and password ) 
 2. start mysql if not running ( $ mysql50 start ) 
 3. create database named "project2" and import project2.sql in phpmyadmin 
 4. start apache server 
   (apache50 start ~workspace/project2/html)
 5.open web server 
 6.Now you should be on home page, you can either goto store or login 
 7.Enter your details to login, if new user you can register for login.
 8.You can go to store and see item on the basis of item category and college of seller.
 9.To get seller details click on link contact seller for respective item.
 10.You can also post your add, for this you need to sign in and then click on sell item.
 11.Fill the form and upload image (optional) to post your add.
 12.You have successfully posted your add!
 

Steps to make this project work on your local server:
 1. Clone this repository on ur local server
 2. Then edit config.json as per your local system i.e. host,username and password.
 3. Now time to migrate database to your server, copy or import models/project2.sql on your dbms.
 4. After migration change the permissions and add this website to vhost.
 5.Visit website at your localhost or vhost as you set..
 6.Repeat Step 6-12 of above.
  
 
 

