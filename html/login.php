<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("login_form.php", ["title" => "Log In"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["email"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password");
        }

        
        else
        
        {
          $email = mysql_real_escape_string($_POST["email"]);
         // query database for user
         $rows = mysql_query("SELECT * FROM Account WHERE email = '$email'") or die(mysql_error());

        // if we found user, check password
        if (mysql_num_rows($rows) == 1)
        {
            // first (and only) row
            $row = mysql_fetch_assoc($rows);

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"], $row["password"])=== $row["password"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["Uid"];

                // redirect to portfolio
                redirect("portfolio.php");
            }
        }
       } 

        // else apologize
        apologize("Invalid username and/or password.");
    }

?>
